<?php

namespace App\Http\Controllers\Modules\W79;

use App\Http\Controllers\Controller;
use App\Models\D76T0000;
use App\Models\D76T2270;
use App\Models\D76T2280;
use Carbon\Carbon;
use DateTime;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use SplFileInfo;

class  W79F1000Controller extends Controller
{
    /**
     * @Notes: Lịch làm việc
     * @Author: TRIHAO
     * @Date: 26/09/2018
     */
    public function __construct() {

    }

    public function index(Request $request, $task = '', $id = '') {

        $title = "Lịch làm việc";
        switch($task) {
            case "":
                $id = $id == '' ? Auth::id() : $id;
                $limitTime = D76T0000::first();
                if (isset($limitTime) && !empty($limitTime)) {
                    $limitTime->BookingTimeFrom = date('H:i:s', strtotime($limitTime->BookingTimeFrom));
                    $limitTime->BookingTimeTo = date('H:i:s', strtotime($limitTime->BookingTimeTo));
                }

                //Get combo the work...
                $theWorks = $this->getTaskInfo();

                $employeesList = $this->getEmployeeList();

                //\Debugbar::info($rsData);
                return view("modules/W79/W79F1000/W79F1000", compact('title', 'limitTime', 'theWorks', 'employeesList', 'id'));
                break;
            case "list":
                $id = $id == '' ? Auth::id() : $id;
                $limitTime = D76T0000::first();
                if (isset($limitTime) && !empty($limitTime)) {
                    $limitTime->BookingTimeFrom = date('H:i:s', strtotime($limitTime->BookingTimeFrom));
                    $limitTime->BookingTimeTo = date('H:i:s', strtotime($limitTime->BookingTimeTo));
                }

                //Get combo the work...
                $theWorks = $this->getTaskInfo();

                $employeesList = $this->getEmployeeList();

                //\Debugbar::info($rsData);
                return view("modules/W79/W79F1000/W79F1000", compact('title', 'limitTime', 'theWorks', 'employeesList', 'id'));
                break;
            case "getSchedules":
                $start = $request->input('start', date('Y-m-01'));
                $end = $request->input('end', date('Y-m-d', strtotime('last day of this month')));
                $start = str_replace('T', ' ', $start);
                $end = str_replace('T', ' ', $end);

                $user_id = Input::get('id', Auth::id());
//                var_dump($user_id);var_dump($start);var_dump($end);die();

                $schedules = D76T2270::where('AppDate', '>=', $start)->where('AppDate', '<=', $end)
                    ->leftJoin('D76T2280 as d1', 'd1.TaskID', '=', 'D76T2270.TaskID')
                    ->where('D76T2270.EmployeeID', $user_id)
                    ->select('D76T2270.*', 'd1.TaskName')
                    ->get();
                $tmp = [];
                foreach($schedules as &$sch) {
                    $sch->id = $sch->AppID;
                    $sch->title = $sch->AppComment;
                    $sch->start = $sch->AppDate . 'T' . date('H:i:s', strtotime($sch->TimeStart));
                    $sch->end = $sch->AppDate . 'T' . date('H:i:s', strtotime($sch->TimeEnd));
                    $sch->status = 0;
                }
//                var_dump($schedules);die();
                return json_encode($schedules);
                break;
            case "addSchedule":
                $data = [];
                $mode = Input::get('mode', 0);
                $data['EmployeeID'] = Auth::id();
                $data['AppDate'] = \Helpers::convertDateWithFormat(Input::get('date', ''), 'Y-m-d');
                $data['TimeStart'] = Input::get('start', '00:00');
                $data['TimeEnd'] = Input::get('end', '00:00');
                switch($mode) {
                    case "0": //add new
                        try {
                            $listWorks = D76T2270::where('AppDate', $data['AppDate'])
                                ->where('EmployeeID', $data['EmployeeID'])
                                ->orderBy('TimeStart')
                                ->get();
                            foreach ($listWorks as $row) {
                                $timeStart = substr(str_replace(':', '', $data['TimeStart']), 0, 4);
                                $start = substr(str_replace(':', '', $row->TimeStart), 0, 4);
                                $timeEnd = substr(str_replace(':', '', $data['TimeEnd']), 0, 4);
                                $end = substr(str_replace(':', '', $row->TimeEnd), 0, 4);
                                if ($timeStart > $start && $timeStart < $end) {
                                    return 0;
                                }
                                if ($timeEnd > $start && $timeEnd < $end) {
                                    return 0;
                                }
                            }
                            $data['AppComment'] = Input::get('title', '');// (Input::get('title', ''));
                            $data['TaskID'] = Input::get('works', '');
                            $data['CreateUserID'] = $data['EmployeeID'];
                            $data['CreateDate'] = Carbon::now();
                            $data['AppID'] = D76T2270::insertGetId($data);//Generate data for new event on client
                            $data['TimeStart'] = $data['AppDate'] . 'T' . $data['TimeStart'] . ':00';
                            $data['TimeEnd'] = $data['AppDate'] . 'T' . $data['TimeEnd'] . ':00';
                            $theWorks = $this->getTaskInfo($data['TaskID']);
                            $data['TaskName'] = $theWorks->TaskName;
                            return json_encode($data);
                        } catch (Exception $ex) {
                            \Debugbar::info($ex->getMessage());
                            return 1;
                        }
                        break;
                    case "1": //edit
                        try {
                            $id = Input::get('id', -1);
                            $data['AppComment'] = Input::get('title', '');
                            $data['TaskID'] = Input::get('works', '');
                            $listWorks = D76T2270::where('AppDate', $data['AppDate'])
                                ->where('AppID', '<>', $id)
                                ->where('EmployeeID', $data['EmployeeID'])
                                ->orderBy('TimeStart')
                                ->get();
                            foreach ($listWorks as $row) {
                                $timeStart = substr(str_replace(':', '', $data['TimeStart']), 0, 4);
                                $start = substr(str_replace(':', '', $row->TimeStart), 0, 4);
                                $timeEnd = substr(str_replace(':', '', $data['TimeEnd']), 0, 4);
                                $end = substr(str_replace(':', '', $row->TimeEnd), 0, 4);
                                if ($timeStart > $start && $timeStart < $end) {
                                    return 0;
                                }
                                if ($timeEnd > $start && $timeEnd < $end) {
                                    return 0;
                                }
                            }
                            D76T2270::where('AppID', $id)->update($data);
                            $data['TimeStart'] = $data['AppDate'] . 'T' . $data['TimeStart'] . ':00';
                            $data['TimeEnd'] = $data['AppDate'] . 'T' . $data['TimeEnd'] . ':00';
                            $theWorks = $this->getTaskInfo($data['TaskID']);
                            $data['TaskName'] = $theWorks->TaskName;
                            return json_encode($data);
                        } catch (Exception $ex) {
                            \Debugbar::info($ex->getMessage());
                            return 1;
                        }

                        break;
                    case "2":
                        try {
                            $id = Input::get('id', -1);
                            D76T2270::where('AppID', $id)->delete();
                        } catch (Exception $ex) {
                            \Debugbar::info($ex->getMessage());
                            return 1;
                        }
                        break;
                }
                break;
        }
    }

    public function getTaskInfo($taskID = '') {
        if (!empty($taskID)) {
            $rs = D76T2280::select('TaskName', 'ProjectID')
                ->where('TaskID', $taskID)
                ->first();
        } else {
            $rs = D76T2280::select('TaskID', 'TaskName', 'ProjectID')->orderBy('Priority')->orderBy('TaskName')->get();
        }
        return $rs;
    }

    public function getEmployeeList() {
        $divisionID = session('W76P0000')->DivisionID;
        $list = DB::select("EXEC W76P9020 '$divisionID', 'EMP'");
        return $list;
    }

}




<?php

namespace App\Http\Controllers\Modules\W84;

use App\Http\Controllers\Controller;
use App\Models\D76T1556;
use App\Models\D76T2140;
use App\Models\D76T2141;
use App\Models\D76T2280;
use App\Models\D76T2300;
use App\Models\D76T2301;
use App\Models\D76T9020;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class  W84F1000Controller extends Controller
{
    private $d76T1556;
    private $d76T2300;
    private $d76T2301;
    private $d76T2280;

    public function __construct(D76T1556 $d76T1556, D76T2300 $d76T2300, D76T2301 $d76T2301, D76T2280 $d76T2280)
    {
        $this->d76T1556 = $d76T1556;
        $this->d76T2300 = $d76T2300;
        $this->d76T2301 = $d76T2301;
        $this->d76T2280 = $d76T2280;
    }

    public function index($task = "", Request $request)
    {
        $title = 'Cập nhật tiến độ';

        switch ($task) {

            case'':
            case'add':
            case 'TaskList':
                $userID = Auth::user()->UserID;
                $divisionID = session('W76P0000')->DivisionID;
                $orgUnitID = session('W76P0000')->OrgUnitID;

                $sql = '--Do nguon cho cong viec' . PHP_EOL;
                $sql .= "EXEC W84P1000 '$userID', '$divisionID', '$orgUnitID'";
                $taskList = DB::select($sql);

//                $sql = '--Do nguon cho combo' . PHP_EOL;
//                $sql .= "SELECT W84P1000 '$userID', '$divisionID', '$orgUnitID'";
//                $taskList = DB::select($sql);

                $priorityList = $this->d76T1556->select('CodeID', 'CodeName')->where('ListTypeID', "=", 'D84F1000_Priority')->get();
                \Debugbar::info($priorityList);

                $projectList = $this->d76T2300->select('ProjectID', 'ProjectName')->orderBy('ProjectName', 'desc')->get();
                \Debugbar::info($projectList);

                $stageList = $this->d76T2301->select('ProjectID', 'StageID', 'StageName')->orderBy('StageName', 'desc')->get();
                \Debugbar::info($stageList);

                $sql = '--Do nguon cho nguoi theo doi' . PHP_EOL;
                $sql .= "EXEC W76P9020 '$divisionID', 'EMP'";
                $empFollowList = DB::select($sql);
                foreach ($empFollowList as &$item) {
                    if ($item->Thumnail == "") {
                        $item->Thumnail = asset('media/available.png');
                    } else {
                        $item->Thumnail = 'data:image/jpeg;base64,' . base64_encode($item->Thumnail);
                    }
                }
                \Debugbar::info($empFollowList);

//                $detail = '';
//
//                if (count($taskList) > 0) {
//                    $firstTask = $taskList[0];
//                    $detail = "DETAIL";
//                }
                \Debugbar::info($taskList);
                return view("modules/W84/W84F1000/W84F1000", compact('empFollowList', 'stageList', 'projectList', 'priorityList', 'detail', 'taskList', 'task'));
                break;
            case 'getdetail':
            case'edit':
                $TaskID = $request->input('TaskID', '');
                \Debugbar::info("testid", $TaskID);
                $userID = Auth::user()->UserID;
                $divisionID = session('W76P0000')->DivisionID;
                $orgUnitID = session('W76P0000')->OrgUnitID;

                $sql = '--Do nguon cho cong viec' . PHP_EOL;
                $sql .= "EXEC W84P1000 '$userID', '$divisionID', '$orgUnitID'";
                $taskList = DB::select($sql);

                $priorityList = $this->d76T1556->select('CodeID', 'CodeName')->where('ListTypeID', "=", 'D84F1000_Priority')->get();
                \Debugbar::info($priorityList);

                $projectList = $this->d76T2300->select('ProjectID', 'ProjectName')->orderBy('ProjectName', 'desc')->get();
                \Debugbar::info($projectList);

                $stageList = $this->d76T2301->select('ProjectID', 'StageID', 'StageName')->orderBy('StageName', 'desc')->get();
                \Debugbar::info($stageList);

                $rowData = $this->getMaster($TaskID);
                \Debugbar::info($rowData);

                $sql = '--Do nguon cho nguoi theo doi' . PHP_EOL;
                $sql .= "EXEC W76P9020 '$divisionID', 'EMP'";
                $empFollowList = DB::select($sql);
                foreach ($empFollowList as &$item) {
                    if ($item->Thumnail == "") {
                        $item->Thumnail = asset('media/available.png');
                    } else {
                        $item->Thumnail = 'data:image/jpeg;base64,' . base64_encode($item->Thumnail);
                    }
                }
                \Debugbar::info($empFollowList);

                return view("modules/W84/W84F1000/W84F1000", compact('rowData', 'empFollowList', 'stageList', 'projectList', 'priorityList', 'detail', 'taskList', 'task'));
                break;

                $userID = Auth::user()->UserID;
                $divisionID = session('W76P0000')->DivisionID;
                $orgUnitID = session('W76P0000')->OrgUnitID;
                $sql = '--Do nguon cho cong viec' . PHP_EOL;
                $sql .= "EXEC W84P1000 '$userID', '$divisionID', '$orgUnitID'";
                $taskList = DB::select($sql);

//                $sql = '--Do nguon cho combo' . PHP_EOL;
//                $sql .= "SELECT W84P1000 '$userID', '$divisionID', '$orgUnitID'";
//                $taskList = DB::select($sql);

                $priorityList = $this->d76T1556->select('CodeID', 'CodeName')->where('ListTypeID', "=", 'D84F1000_Priority')->get();
                \Debugbar::info($priorityList);

                $projectList = $this->d76T2300->select('ProjectID', 'ProjectName')->orderBy('ProjectName', 'desc')->get();
                \Debugbar::info($projectList);

                $stageList = $this->d76T2301->select('ProjectID', 'StageID', 'StageName')->orderBy('StageName', 'desc')->get();
                \Debugbar::info($stageList);

                $sql = '--Do nguon cho nguoi theo doi' . PHP_EOL;
                $sql .= "EXEC W76P9020 '$divisionID', 'EMP'";
                $empFollowList = DB::select($sql);
                foreach ($empFollowList as &$item) {
                    if ($item->Thumnail == "") {
                        $item->Thumnail = asset('media/available.png');
                    } else {
                        $item->Thumnail = 'data:image/jpeg;base64,' . base64_encode($item->Thumnail);
                    }
                }
                \Debugbar::info($empFollowList);

                $TaskID = $request->input('TaskID', '');
                if ($TaskID == '') {
                    $taskFirst = $this->d76T2280->where("TaskID", "=", $TaskID)->first();
                    if ($taskFirst != null) {
                        $TaskID = $taskFirst->TaskID;
                    }
                }
                $newsList = $this->getMaster($TaskID);
                \Debugbar::info($taskList);
                return view("modules/W84/W84F1000/W84F1000", compact('newsList', 'empFollowList', 'stageList', 'projectList', 'priorityList', 'detail', 'taskList', 'task'));
                break;

            case'save':
                try {
                    //$TaskID = $request->input('TaskID', '');
                    $taskNameW84F1000 = \Helpers::sqlstring($request->input('taskNameW84F1000', ''));
                    $employeeW84F1001 = \Helpers::sqlstring($request->input('employeeW84F1001', ''));
                    $priorityW84F1001 = \Helpers::sqlstring($request->input('priorityW84F1001', ''));
                    $projectIDW84F1001 = \Helpers::sqlstring($request->input('projectIDW84F1001', ''));
                    $projectStageW84F1001 = \Helpers::sqlstring($request->input('projectStageW84F1001', ''));
                    $startDateW84F1001 = \Helpers::createDateTime($request->input('startDateW84F1001', ''));
                    $deadlineW84F1001 = \Helpers::createDateTime($request->input('deadlineW84F1001', ''));
                    $empFollowW84F1001 = \Helpers::createDateTime($request->input('empFollowW84F1001', ''));
                    $descriptionW84F1001 = \Helpers::sqlstring($request->input('descriptionW84F1001', ''));
                    $userID = Auth::user()->UserID;
                    $dateNow = Carbon::now();
                    //save master
                    $data = [
                        //"TaskID" => $TaskID,
                        "TaskName" => $taskNameW84F1000,
                        "ProjectID" => $projectIDW84F1001,
                        "ProjectStage" => $projectStageW84F1001,
//                        "EmployeeID" => $employeeW84F1001,
//                        "EmpFollow" => $empFollowW84F1001,
                        "Priority" => $priorityW84F1001,
                        "StartDate" => $startDateW84F1001,
                        "Deadline" => $deadlineW84F1001,
                        "Remark" => $descriptionW84F1001,
                        "CreateDate" => $dateNow,
                        "CreateUserID" => $userID,
                    ];
                    $this->d76T2280->insert($data);

                    \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'));
//                    \Helpers::setSession('lastNewsModified', $newsID);
                    return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong')]);
                } catch (\Exception $ex) {
                    \Helpers::log($ex->getMessage());
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }
                break;

            case 'getdetail':
                $TaskID = $request->input('TaskID', '');
                $newDetail = $this->getMaster($TaskID);
                \Debugbar::info($newDetail);
                return view("modules/W84/W84F1000/W84F1000", compact('TaskID', 'newsList', 'empFollowList', 'stageList', 'projectList', 'priorityList', 'detail', 'taskList', 'task'));
                break;

            case'UpdateProcess':
                $statusList = $this->d76T1556->select('CodeID', 'CodeName')->where('ListTypeID', "=", 'D84F1000_StatusID')->get();
                \Debugbar::info($statusList);
                return view("modules/W84/W84F1000/UpdateProcess", compact('statusList', 'task'));
                break;
            case 'AssignTask':
                return view("modules/W84/W84F1000/AssignTask", compact('task'));
                break;


        }

    }

    function getMaster($TaskID)
    {
        $result = $this->d76T2280->where("TaskID", "=", $TaskID)->first();
        \Debugbar::info("tesst", $result);
        return $result;
    }
}

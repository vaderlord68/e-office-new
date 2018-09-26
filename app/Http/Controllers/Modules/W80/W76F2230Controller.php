<?php

namespace App\Http\Controllers\Module\BookingRoom;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\BookingRoom\D76T2230;
use App\Module\Meeting\D76T2200;
use App\Module\Meeting\D76T9000;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class  W76F2230Controller extends Controller
{
    private $d76T2200;
    private $d76T9000;
    private $d76T2230;

    public function __construct(D76T2200 $d76T2200, D76T9000 $d76T9000, D76T2230 $d76T2230)
    {
        $this->d76T2200 = $d76T2200;
        $this->d76T9000 = $d76T9000;
        $this->d76T2230 = $d76T2230;
        $this->newsHelper = new \App\Module\News\Helper();
    }

    public function index($task = "", Request $request)
    {
        switch ($task) {
            case '':
                $divisionIDList = $this->d76T9000->where('DISABLED', '=', 0)->select('OrgunitID', 'OrgunitName')->get();
                $meetingRoomList = $this->d76T2200->select('FacilityNo as id', 'FacilityName as title', 'DisplayOrder as display')
                    ->where("DivisionID", '=', session('W76P0000')->DivisionID)->get();
                $meetingRoomList = json_encode($meetingRoomList);
                $divisionIDList = json_encode($divisionIDList);
                $meetingRoomDetail = $this->d76T2200->where("DivisionID", '=', session('W76P0000')->DivisionID)->get();
                \Debugbar::info($meetingRoomDetail);
                $newsCollection = $this->getCalender();
                $newsCollection = ($newsCollection);

                return view("system/module/BookingRoom/W76F2230/W76F2230", compact('meetingRoomDetail', 'newsCollection', 'rowData', 'divisionIDList', 'meetingRoomList', 'task'));
                break;
            case 'loadCalender':
                $newsCollection = $this->getCalender();
                //\Debugbar::info($newsCollection);
                return $newsCollection();
                break;
            case 'delete':
                $ID = $request->input('id', '');
                \Debugbar::info($ID);
                $sql = "--Xoa hop dong" . PHP_EOL;
                $sql .= "delete from D76T2230 where ID = '$ID'" . PHP_EOL;
                \Debugbar::info($sql);
                try {
                    DB::statement($sql);
                    \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_xoa_thanh_cong'));
                    return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_xoa_thanh_cong')]);
                } catch (\Exception $ex) {
                    \Helpers::log($ex->getMessage());
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }
                break;
        }
    }

    public function getCalender()
    {
        $userID = Auth::user()->UserID;
        $divisionID = session('W76P0000')->DivisionID;
        $orgUnitID = session('W76P0000')->OrgUnitID;
        $sql = '--Do nguon cho luoi' . PHP_EOL;
        $sql .= "EXEC W76P2230 '$userID', '$divisionID','$orgUnitID'";
        $collection = DB::select($sql);
        foreach ($collection as $row) {
            $row->resourceId = $row->FacilityID;
            $row->title = $row->Description;
            $RequestedDateFrom = $row->RequestedDateFrom;
            $RequestedDateTo = $row->RequestedDateTo;
            $row->start = str_replace(' ', 'T', $RequestedDateFrom);
            $row->end = str_replace(' ', 'T', $RequestedDateTo);
        }
        //\Debugbar::info($collection);
        return json_encode($collection);
    }

    public function deleteCalender($ID)
    {
        $result = $this->d76T2230->where("ID", "=", $ID)->delete();
        //\Debugbar::info($result);
        return $result;
    }

}

<?php

namespace App\Http\Controllers\Module\BookingRoom;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\Meeting\D76T2200;
use App\Module\Meeting\D76T9000;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class  W76F2230Controller extends Controller
{
    private $d76T2200;
    private $d76T9000;

    public function __construct(D76T2200 $d76T2200, D76T9000 $d76T9000)
    {
        $this->d76T2200 = $d76T2200;
        $this->d76T9000 =$d76T9000;
        $this->newsHelper = new \App\Module\News\Helper();
    }

    public function index($task = "")
    {
        switch ($task) {
            case '':
                $divisionIDList = $this->d76T9000->where('DISABLED', '=', 0)->select('OrgunitID', 'OrgunitName')->get();
                $meetingRoomList = $this->d76T2200->select('FacilityNo as id', 'FacilityName as title')->where("DivisionID", '=', session('W76P0000')->DivisionID)->get();
                $meetingRoomList = json_encode($meetingRoomList);
                $divisionIDList = json_encode($divisionIDList);

                $newsCollection = $this->getCalender();
                $newsCollection = ($newsCollection);
                \Debugbar::info($newsCollection);
                return view("system/module/BookingRoom/W76F2230/W76F2230", compact('newsCollection','rowData','divisionIDList','meetingRoomList','task'));
                break;
            case 'loadCalender':
                $newsCollection = $this->getCalender();
                \Debugbar::info($newsCollection);
                return $newsCollection();
                break;
        }
    }

    public function getCalender()
    {
        $userID = Auth::user()->UserID;
        $divisionID = session('W76P0000')->DivisionID;
        $orgUnitID = session('W76P0000')->OrgUnitID;
        $sql = '--Do nguon cho luoi'.PHP_EOL;
        $sql .= "EXEC W76P2230 '$userID', '$divisionID','$orgUnitID'";
        $collection = DB::select($sql);

//        {
//            "resourceId": "b",
//                    title: 'Event Title1',
//                    start: '2018-09-17T13:13:55.008',
//                    end: '2018-09-17T13:13:55.008'
//                },


//

        foreach ($collection as $row){
            $row->resourceId = $row->FacilityID;
            $row->title = $row->Description;
            $RequestedDateFrom = $row->RequestedDateFrom;
            $RequestedDateTo = $row->RequestedDateTo;
            $row->start = str_replace(' ','T', $RequestedDateFrom);
            $row->end = str_replace(' ','T', $RequestedDateTo);
        }

        \Debugbar::info($collection);
        return json_encode($collection) ;
    }

}

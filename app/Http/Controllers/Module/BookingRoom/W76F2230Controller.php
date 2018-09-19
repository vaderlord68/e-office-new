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
                $meetingRoomList = $this->d76T2200->select('FacilityNo as id', 'FacilityName as title')->get();
                $meetingRoomList = json_encode($meetingRoomList);
                $divisionIDList = json_encode($divisionIDList);
                \Debugbar::info($divisionIDList);
                return view("system/module/BookingRoom/W76F2230/W76F2230", compact('rowData','divisionIDList','meetingRoomList','task'));
                break;
        }
    }

}

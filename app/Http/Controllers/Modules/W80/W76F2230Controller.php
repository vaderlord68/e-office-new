<?php

namespace App\Http\Controllers\Modules\W80;

use App\Http\Controllers\Controller;
use App\Models\D76T2200;
use App\Models\D76T2230;
use App\Models\D76T9000;
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
                $meetingRoomList = $this->d76T2200->select('FacilityNo as id', 'FacilityName as title')->where("DivisionID", '=', session('W76P0000')->DivisionID)->get();
                $meetingRoomList = json_encode($meetingRoomList);
                $divisionIDList = json_encode($divisionIDList);

                $newsCollection = $this->getCalender();
                $newsCollection = ($newsCollection);
                //\Debugbar::info($newsCollection);
                return view("modules/W80/W76F2230/W76F2230", compact('newsCollection', 'rowData', 'divisionIDList', 'meetingRoomList', 'task'));
                break;
            case 'loadCalender':
                $newsCollection = $this->getCalender();
                //\Debugbar::info($newsCollection);
                return $newsCollection();
                break;
            case 'delete':
                try {
                    $ID = $request->input('ID', '');
                    \Debugbar::info($ID );
                    if ($this->deleteCalender($ID)) {
                        \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_xoa_thanh_cong'));
                        return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_xoa_thanh_cong')]);
                    } else {
                        return json_encode(array('status' => 'ERROR', 'message' => \Helpers::getRS("Co_loi_xay_ra_trong_qua_trinh_xoa_du_lieu")));
                    }
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
        $orgUnitID = isset(session('W76P0000')->OrgUnitID) ? session('W76P0000')->OrgUnitID : '';
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
        \Debugbar::info($result);
        return $result;
    }

}

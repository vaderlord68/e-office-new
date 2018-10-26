<?php

namespace App\Http\Controllers\Modules\W77;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Models\D76T0000;
use App\Models\D76T2200;
use App\Models\D76T2230;
use App\Models\D76T2261;
use App\Models\D76T2262;
use App\Models\D76T9000;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class  W77F2000Controller extends Controller
{
    private $d76T2261;
    private $d76T2262;
    private $d76T0000;

    /**
     * @param string $task
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function __construct(D76T2261 $d76T2261, D76T2262 $d76T2262, D76T0000 $d76T0000)
    {
        $this->d76T2261 = $d76T2261;
        $this->d76T2262 = $d76T2262;
        $this->d76T0000 = $d76T0000;
    }

    public function index($task = "", Request $request)
    {
        $title= Helpers::getRS('Quan_ly_xe_cong_tac');
        switch ($task) {
            case'':
            case 'listCar':
                $userID = Auth::user()->UserID;
                $divisionID = session('W76P0000')->DivisionID;
                $orgUnitID = session('W76P0000')->OrgUnitID;

                $sql = '--Do nguon cho combo don vi' . PHP_EOL;
                $sql .= "EXEC D76P9000 '$userID', '$orgUnitID','$divisionID'";
                $divisionIDList = DB::select($sql);
                $divisionIDList = json_encode($divisionIDList);

                $sql = '--Do nguon cho xe' . PHP_EOL;
                $sql .= "EXEC W77P2001 '$userID', '$orgUnitID','$divisionID'";

                $carDList = DB::select($sql);

                foreach ($carDList as $row){
                    $row->id = $row->CarNo;
                    $row->title = $row->CarBranch;
                }

            \Debugbar::info($carDList);
                $carDList = json_encode($carDList);

//                $carDList = $this->d76T2261->select('CarNo as id', 'CarBranch as title')->orderBy('DisplayOrder', 'desc')->get();
//                $carDList = json_encode($carDList);
                //\Debugbar::info($carDList);

                $newsCollection = $this->getCalender();
                $newsCollection = ($newsCollection);
                //\Debugbar::info($newsCollection);

                $limitTime = $this->d76T0000->first();
                if (isset($limitTime) && !empty($limitTime)) {
                    $limitTime->BookingTimeFrom = date('H:i:s', strtotime($limitTime->BookingTimeFrom));
                    $limitTime->BookingTimeTo = date('H:i:s', strtotime($limitTime->BookingTimeTo));
                }

                return view("modules/W77/W77F2000/W77F2000", compact('title','limitTime', 'carDList', 'newsCollection', 'divisionIDList', 'task'));
                break;
            case'loadCalender':
                $newsCollection = $this->getCalender();
                //\Debugbar::info($newsCollection);
                return $newsCollection();
                break;
            case 'delete':
                $CarBookingID = $request->input('carBookingID', '');
                \Debugbar::info($CarBookingID);
                $sql = "--Xoa phong hop" . PHP_EOL;
                $sql .= "delete from D76T2262 where CarBookingID = '$CarBookingID'" . PHP_EOL;
                //\Debugbar::info($sql);
                try {
                    DB::statement($sql);
                    Helpers::setSession('successMessage', Helpers::getRS('Du_lieu_da_duoc_xoa_thanh_cong'));
                    return json_encode(['status' => 'SUCC', 'message' => Helpers::getRS('Du_lieu_da_duoc_xoa_thanh_cong')]);
                } catch (\Exception $ex) {
                    Helpers::log($ex->getMessage());
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }
                break;
        }
    }

    private function getCalender()
    {
        $userID = Auth::user()->UserID;
        $divisionID = session('W76P0000')->DivisionID;
        $orgUnitID = session('W76P0000')->OrgUnitID;
        $sql = '--Do nguon cho luoi' . PHP_EOL;
        $sql .= "EXEC W77P2000'$userID', '$orgUnitID','$divisionID'";
        $collection = DB::select($sql);
        foreach ($collection as $row) {
            $row->resourceId = $row->CarNo;
            $row->title = $row->Description;
            $RequestedDateFrom = $row->RequestedDateFrom;
            $RequestedDateTo = $row->RequestedDateTo;
            $row->start = str_replace(' ', 'T', $RequestedDateFrom);
            $row->end = str_replace(' ', 'T', $RequestedDateTo);
        }

        return json_encode($collection);
    }

}

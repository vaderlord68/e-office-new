<?php

namespace App\Http\Controllers\Modules\W80;

use App\Http\Controllers\Controller;
use App\Models\D76T1556;
use App\Models\D76T2200;
use App\Models\D76T9000;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class  W76F2201Controller extends Controller
{
    private $d76T9000;
    private $d76T1556;
    private $d76T2200;

    public function __construct(D76T9000 $d76T9000, D76T1556 $d76T1556, D76T2200 $d76T2200)
    {
        $this->d76T9000 = $d76T9000;
        $this->d76T2200 = $d76T2200;
        $this->d76T1556 = $d76T1556;
        $this->newsHelper = new \App\Module\News\Helper();
    }

    public function index(Request $request, $task = "")
    {
        switch ($task) {
            case 'add':
                $d76T9000 = new D76T9000();
                $divisionIDList = $this->d76T9000->where('DISABLED', '=', 0)->select('OrgunitID', 'OrgunitName')->get();
                $coordinatorList = $this->d76T1556->where('ListTypeID', '=', 'D76T2200_Coordinator')->select('CodeID', 'CodeName')->get();
                $logisticsList = $this->d76T1556->where('ListTypeID', '=', 'D76T2200_Logistics')->select('CodeID', 'CodeName')->get();
                $CreateUserID = session("current_user");
                $rowData = json_encode(array());
                \Debugbar::info($divisionIDList);
                return view("modules/W80/W76F2201/W76F2201", compact('logisticsList', 'coordinatorList', 'rowData', 'CreateUserID', 'divisionIDList', 'task'));
                break;
            case 'view':
            case 'edit':
                $facilityID = $request->input('facilityID', '');
                $divisionIDList = $this->d76T9000->where('DISABLED', '=', 0)->select('OrgunitID', 'OrgunitName')->get();
                $coordinatorList = $this->d76T1556->where('ListTypeID', '=', 'D76T2200_Coordinator')->select('CodeID', 'CodeName')->get();
                $logisticsList = $this->d76T1556->where('ListTypeID', '=', 'D76T2200_Logistics')->select('CodeID', 'CodeName')->get();
                $rowData = $this->getMasterData($facilityID);

                return view("modules/W80/W76F2201/W76F2201", compact('rowData', 'task', 'channelIDList', 'divisionIDList', 'coordinatorList', 'logisticsList'));
                break;
            case 'save':
                try {
                    $txtFacilityNoW76F2201 = \Helpers::sqlstring($request->input('txtFacilityNoW76F2201', ''));
                    $txtFacilityNameW76F2201 = \Helpers::sqlstring($request->input('txtFacilityNameW76F2201', ''));
                    $txtDescriptionW76F2201 = \Helpers::sqlstring($request->input('txtDescriptionW76F2201', ''));
                    $txtLocationW76F2201 = \Helpers::sqlstring($request->input('txtLocationW76F2201', ''));
                    $txtCapacityW76F2201 = \Helpers::sqlNumber($request->input('txtCapacityW76F2201', 1));
                    $disabledW76F2201 = \Helpers::sqlNumber($request->input('disabledW76F2201', 0));
                    $isBlackboardW76F2201 = \Helpers::sqlNumber($request->input('isBlackboardW76F2201', 0));
                    $isProjectorW76F2201 = \Helpers::sqlNumber($request->input('isProjectorW76F2201', 0));
                    $isEthernetW76F2201 = \Helpers::sqlNumber($request->input('isEthernetW76F2201', 0));
                    $isPCW76F2201 = \Helpers::sqlNumber($request->input('isPCW76F2201', 0));
                    $isMicrophoneW76F2201 = \Helpers::sqlNumber($request->input('isMicrophoneW76F2201', 0));
                    $isTeleConW76F2201 = \Helpers::sqlNumber($request->input('isTeleConW76F2201', 0));
                    $isWifiW76F2201 = \Helpers::sqlNumber($request->input('isWifiW76F2201', 0));
                    $isVideoConW76F2201 = \Helpers::sqlNumber($request->input('isVideoConW76F2201', 0));
                    $divisionIDW76F2201 = \Helpers::sqlstring($request->input('divisionIDW76F2201', ''));
                    $logisticsW76F2201 = $request->input('logisticsW76F2201', []);
                    $coordinatorW76F2201 = \Helpers::sqlstring($request->input('coordinatorW76F2201', ''));
                    $displayOrderW76F2201 = \Helpers::sqlNumber($request->input('displayOrderW76F2201', 1));
                    $createDateW76F2201 = Carbon::now();
                    $createUserIDW76F2201 = Auth::user()->UserID;
                    $lastModifyDateW76F2201 = Carbon::now();
                    $lastModifyUserIDW76F2201 = Auth::user()->UserID;


                    $sql = "---Kiem tra du lieu truoc khi luu" . PHP_EOL;
                    $sql .= "SELECT Top 1 1 as check_exist " . PHP_EOL;
                    $sql .= "FROM D76T2200 WITH(NOLOCK)" . PHP_EOL;
                    $sql .= "WHERE FacilityNo = '$txtFacilityNoW76F2201'" . PHP_EOL;

                    $check_store = DB::selectOne($sql);

                    //\Debugbar::info($check_store->check_exist);
                    $exist = "";
                    if ($check_store != null){
                        $exist = intval($check_store->check_exist);
                    }
                    if ($exist == 1) {
                        \Debugbar::info("sdfds");
                        return json_encode(["status" => "EXIST", "message" => \Helpers::getRS('Ma_phong_hop_nay_da_ton_tai_ban_khong_duoc_phep_luu')]);
                    } else {
                        $data = [
                            "FacilityNo" => $txtFacilityNoW76F2201,
                            "FacilityName" => $txtFacilityNameW76F2201,
                            "Description" => $txtDescriptionW76F2201,
                            "Location" => $txtLocationW76F2201,
                            "Capacity" => $txtCapacityW76F2201,
                            "Disabled" => $disabledW76F2201,
                            "IsBlackboard" => $isBlackboardW76F2201,
                            "IsProjector" => $isProjectorW76F2201,
                            "IsEthernet" => $isEthernetW76F2201,
                            "IsPC" => $isPCW76F2201,
                            "IsMicrophone" => $isMicrophoneW76F2201,
                            "IsTeleCon" => $isTeleConW76F2201,
                            "IsWifi" => $isWifiW76F2201,
                            "IsVideoCon" => $isVideoConW76F2201,
                            "DivisionID" => $divisionIDW76F2201,
                            //"Logistics" => $logisticsW76F2201,
                            "Logistics" => implode(';', $logisticsW76F2201),
                            "Coordinator" => $coordinatorW76F2201,
                            "DisplayOrder" => $displayOrderW76F2201,
                            "CreateUserID" => $createUserIDW76F2201,
                            "CreateDate" => $createDateW76F2201,
                            "LastModifyUserID" => $lastModifyUserIDW76F2201,
                            "LastModifyDate" => $lastModifyDateW76F2201,
                        ];
                        $this->d76T2200->insert($data);

                        \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'));
                        \Debugbar::info();
                        return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'), 'redirectTo' => $_SERVER["HTTP_REFERER"]]);
                    }
                } catch (\Exception $ex) {
                    \Helpers::log($ex->getMessage());
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }
                break;
            case 'update':
                try {
                    $facilityID = $request->input('facilityID', '');
                    \Debugbar::info($request->input());
                    $txtFacilityNameW76F2201 = \Helpers::sqlstring($request->input('txtFacilityNameW76F2201', ''));
                    $txtDescriptionW76F2201 = \Helpers::sqlstring($request->input('txtDescriptionW76F2201', ''));
                    $txtLocationW76F2201 = \Helpers::sqlstring($request->input('txtLocationW76F2201', ''));
                    $txtCapacityW76F2201 = \Helpers::sqlNumber($request->input('txtCapacityW76F2201', 1));
                    $disabledW76F2201 = \Helpers::sqlNumber($request->input('disabledW76F2201', 0));
                    $isBlackboardW76F2201 = \Helpers::sqlNumber($request->input('isBlackboardW76F2201', 0));
                    $isProjectorW76F2201 = \Helpers::sqlNumber($request->input('isProjectorW76F2201', 0));
                    $isEthernetW76F2201 = \Helpers::sqlNumber($request->input('isEthernetW76F2201', 0));
                    $isPCW76F2201 = \Helpers::sqlNumber($request->input('isPCW76F2201', 1));
                    $isMicrophoneW76F2201 = \Helpers::sqlNumber($request->input('isMicrophoneW76F2201', 0));
                    $isTeleConW76F2201 = \Helpers::sqlNumber($request->input('isTeleConW76F2201', 0));
                    $isWifiW76F2201 = \Helpers::sqlNumber($request->input('isWifiW76F2201', 0));
                    $isVideoConW76F2201 = \Helpers::sqlNumber($request->input('isVideoConW76F2201', 0));
                    $divisionIDW76F2201 = \Helpers::sqlstring($request->input('divisionIDW76F2201', ''));

                    $logisticsW76F2201 = $request->input('logisticsW76F2201', []);
                    $coordinatorW76F2201 = \Helpers::sqlstring($request->input('coordinatorW76F2201', ''));
                    $displayOrderW76F2201 = \Helpers::sqlNumber($request->input('displayOrderW76F2201', 1));
                    $createUserIDW76F2201 = Auth::user()->UserID;
                    $lastModifyDateW76F2201 = Carbon::now();
                    $lastModifyUserIDW76F2201 = Auth::user()->UserID;


                    $data = [
                        "FacilityName" => $txtFacilityNameW76F2201,
                        "Description" => $txtDescriptionW76F2201,
                        "Location" => $txtLocationW76F2201,
                        "Capacity" => $txtCapacityW76F2201,
                        "Disabled" => $disabledW76F2201,
                        "IsBlackboard" => $isBlackboardW76F2201,
                        "IsProjector" => $isProjectorW76F2201,
                        "IsEthernet" => $isEthernetW76F2201,
                        "IsPC" => $isPCW76F2201,
                        "IsMicrophone" => $isMicrophoneW76F2201,
                        "IsTeleCon" => $isTeleConW76F2201,
                        "IsWifi" => $isWifiW76F2201,
                        "IsVideoCon" => $isVideoConW76F2201,
                        "DivisionID" => $divisionIDW76F2201,
                        "Logistics" => implode(';', $logisticsW76F2201),
                        "Coordinator" => $coordinatorW76F2201,
                        "DisplayOrder" => $displayOrderW76F2201,
                        "CreateUserID" => $createUserIDW76F2201,
                        "LastModifyUserID" => $lastModifyUserIDW76F2201,
                        "LastModifyDate" => $lastModifyDateW76F2201,
                    ];
                    $this->d76T2200->where("FacilityID", '=', $facilityID)->update($data);

                    \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'));
                    \Debugbar::info();
                    return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'), 'redirectTo' => $_SERVER["HTTP_REFERER"]]);
                } catch (\Exception $ex) {
                    \Helpers::log($ex->getMessage());
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }
                break;

        }
    }

    private function getMasterData($facilityID)
    {
        $result = $this->d76T2200->where("FacilityID", "=", $facilityID)->first();
        $result->Logistics = explode(';', $result->Logistics);
        return $result;
    }
}

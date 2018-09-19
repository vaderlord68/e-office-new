<?php

namespace App\Http\Controllers\Module\BookingRoom;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\Meeting\D76T2200;
use App\Module\BookingRoom\D76T2230;
use App\Module\W76\D76T1556;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class  W76F2231Controller extends Controller
{
    private $d76T1556;
    private $d76T2200;
    private $d76T2230;

    public function __construct(D76T1556 $d76T1556, D76T2200 $d76T2200, D76T2230 $d76T2230)
    {
        $this->d76T1556 = $d76T1556;
        $this->d76T2200 = $d76T2200;
        $this->d76T2230 = $d76T2230;
    }

    public function index(Request $request, $task = "")
    {
        switch ($task) {
            case 'add':
                $all = $request->input();
                $facilityList = $this->d76T2200->select('FacilityNo', 'FacilityName')->get();
                $logisticsList = $this->d76T1556->where('ListTypeID', '=', 'D76T2200_Logistics')->select('CodeID', 'CodeName')->get();
                $CreateUserID = Auth::user()->UserID;
                $rowData = json_encode(array());
                return view("system/module/BookingRoom/W76F2231/W76F2231", compact('facilityList', 'meetingRoomList', 'all', 'rowData', 'CreateUserID', 'logisticsList', 'task'));
                break;
            case 'save':
                try {
                    $cbFacilityIDW76F2231 = \Helpers::sqlstring($request->input('cbFacilityIDW76F2231', ''));
                    $descriptionW76F2231 = \Helpers::sqlstring($request->input('descriptionW76F2231', ''));
                    $orgunitIDW76F2231 = \Helpers::sqlstring($request->input('orgunitIDW76F2231', ''));
                    $cbHostPersonW76F2231 = \Helpers::sqlstring($request->input('cbHostPersonW76F2231', ''));
                    $cbParticipantsW76f2231 = \Helpers::sqlstring($request->input('cbParticipantsW76f2231', ''));
                    $txtNumParticipantsW76F22311 = \Helpers::sqlNumber($request->input('txtNumParticipantsW76F2231', 1));

                    $dateFromW76F2231 =  $request->input('dateFromW76F2231', '');
                    $dateFromW76F2231 = \Helpers::convertDateWithFormat($dateFromW76F2231, 'Y-m-d');
                    $timeFromW76F2231 = $request->input('timeFromW76F2231', '');
                    $requestedDateFromW76F2231 = DateTime::createFromFormat('Y-m-d H:i:s', $dateFromW76F2231.' '.$timeFromW76F2231.':00');

                    $dateToW76F2231 =  $request->input('dateToW76F2231', '');
                    $dateToW76F2231 = \Helpers::convertDateWithFormat($dateToW76F2231, 'Y-m-d');
                    $timeToW76F2231 = $request->input('timeToW76F2231', '');
                    $requestedDateToW76F2231 = DateTime::createFromFormat('Y-m-d H:i:s', $dateToW76F2231.' '.$timeToW76F2231.':00');

                    $isBlackboardW76F2231 = \Helpers::sqlNumber($request->input('isBlackboardW76F2231', 1));
                    $isProjectorW76F2231 = \Helpers::sqlNumber($request->input('isProjectorW76F2231', 1));
                    $isEthernetW76F2231 = \Helpers::sqlNumber($request->input('isEthernetW76F2231', 1));
                    $isPCW76F2231 = \Helpers::sqlNumber($request->input('isPCW76F2231', 1));
                    $isMicrophoneW76F2231 = \Helpers::sqlNumber($request->input('isMicrophoneW76F2231', 1));
                    $isTeleConW76F2231 = \Helpers::sqlNumber($request->input('isTeleConW76F223', 1));
                    $isWifiW76F2231 = \Helpers::sqlNumber($request->input('isWifiW76F223', 1));
                    $logisticsW76F2231 = \Helpers::sqlNumber($request->input('logisticsW76F2231', 1));
                    $createDateW76F2231 = Carbon::now();
                    $createUserIDW76F2231 = Auth::user()->UserID;
                    $lastModifyDateW76F2231 = Carbon::now();
                    $lastModifyUserIDW76F2231 = Auth::user()->UserID;
                    $data = [
                        "FacilityID" => $cbFacilityIDW76F2231,
                        "Description" => $descriptionW76F2231,
                        "OrgunitID" => $orgunitIDW76F2231,
                        "HostPerson" => $cbHostPersonW76F2231,
                        "Participants" => $cbParticipantsW76f2231,
                        "NumParticipants" => $txtNumParticipantsW76F22311,
                        "RequestedDateFrom" => $requestedDateFromW76F2231,
                        "RequestedDateTo" => $requestedDateToW76F2231,
                        "IsBlackboard" => $isBlackboardW76F2231,
                        "IsProjector" => $isProjectorW76F2231,
                        "IsEthernet" => $isEthernetW76F2231,
                        "IsPC" => $isPCW76F2231,
                        "IsMicrophone" => $isMicrophoneW76F2231,
                        "IsTeleCon" => $isTeleConW76F2231,
                        "IsWifi" => $isWifiW76F2231,
                        "Logistics" => implode(';', $logisticsW76F2231),
                        "CreateDate" => $createDateW76F2231,
                        "CreateUserID" => $createUserIDW76F2231,
                        "LastModifyDate" => $lastModifyDateW76F2231,
                        "LastModifyUserID" => $lastModifyUserIDW76F2231,
                    ];
                    $this->d76T2230->insert($data);

                    \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'));
                    \Debugbar::info($data);
                    return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'), 'redirectTo' => $_SERVER["HTTP_REFERER"]]);

                } catch (\Exception $ex) {
                    \Helpers::log($ex->getMessage());
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }
                break;
        }
    }
}

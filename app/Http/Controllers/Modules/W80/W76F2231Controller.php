<?php

namespace App\Http\Controllers\Modules\W80;

use App\Http\Controllers\Controller;
use App\Models\D76T1556;
use App\Models\D76T2200;
use App\Models\D76T2230;
use App\Models\D76T9020;
use Carbon\Carbon;
use DateTime;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class  W76F2231Controller extends Controller
{
    private $d76T1556;
    private $d76T2200;
    private $d76T2230;
    private $d76T9020;

    public function __construct(D76T1556 $d76T1556, D76T9020 $d76T9020, D76T2200 $d76T2200, D76T2230 $d76T2230)
    {
        $this->d76T1556 = $d76T1556;
        $this->d76T2200 = $d76T2200;
        $this->d76T2230 = $d76T2230;
        $this->d76T9020 = $d76T9020;
    }

    public function index(Request $request, $task = "")
    {
        $permission = Helpers::getPermission('W76F2231');
        switch ($task) {
            //case 'edit':
            case 'add':
                $all = $request->input();
                $hostPersonList = $this->d76T9020->select('EmployeeCode', 'Fullname')->orderBy('Fullname', 'desc')->get();
                $participantsList = $this->d76T9020->select('EmployeeCode', 'Fullname')->orderBy('Fullname', 'desc')->get();
                $divisionIDW76F2231 = session('W76P0000')->DivisionID;
                $facilityList = $this->d76T2200->select('FacilityNo', 'FacilityName')->where('DivisionID', $divisionIDW76F2231)->orderBy('FacilityName', 'desc')->get();
                $logisticsList = $this->d76T1556->where('ListTypeID', '=', 'D76T2200_Logistics')->select('CodeID', 'CodeName')->get();
                $CreateUserID = Auth::user()->UserID;
                $rowData = json_encode(array());
                return view("modules/W80/W76F2231/W76F2231", compact('permission','participantsList', 'hostPersonList', 'facilityList', 'meetingRoomList', 'all', 'rowData', 'CreateUserID', 'logisticsList', 'task'));
                break;
            case 'edit':
                $all = $request->input();
                $ID = $request->input('ID', '');
                $hostPersonList = $this->d76T9020->select('EmployeeCode', 'Fullname')->orderBy('Fullname', 'desc')->get();
                $participantsList = $this->d76T9020->select('EmployeeCode', 'Fullname')->orderBy('Fullname', 'desc')->get();
                $divisionIDW76F2231 = session('W76P0000')->DivisionID;
                $facilityList = $this->d76T2200->select('FacilityNo', 'FacilityName')->where('DivisionID', $divisionIDW76F2231)->orderBy('FacilityName', 'desc')->get();
                $logisticsList = $this->d76T1556->where('ListTypeID', '=', 'D76T2200_Logistics')->select('CodeID', 'CodeName')->get();
                $CreateUserID = Auth::user()->UserID;
                $rowData = $this->getMasterData($ID);
                //\Debugbar::info($rowData);
                return view("modules/W80/W76F2231/W76F2231", compact('permission','participantsList', 'hostPersonList', 'facilityList', 'meetingRoomList', 'all', 'rowData', 'CreateUserID', 'logisticsList', 'task'));
                break;
            case 'save':
                try {
                    $cbFacilityIDW76F2231 = \Helpers::sqlstring($request->input('cbFacilityIDW76F2231', ''));
                    $descriptionW76F2231 = \Helpers::sqlstring($request->input('descriptionW76F2231', ''));
                    $orgunitIDW76F2231 = \Helpers::sqlstring($request->input('orgunitIDW76F2231', ''));
                    $cbHostPersonW76F2231 = \Helpers::sqlstring($request->input('cbHostPersonW76F2231', ''));
                    $cbParticipantsW76F2231 = $request->input('cbParticipantsW76F2231', []);
                    $txtNumParticipantsW76F22311 = \Helpers::sqlNumber($request->input('txtNumParticipantsW76F2231', 1));
                    $logisticsW76F2231 = $request->input('logisticsW76F2231', []);

                    $dateFromW76F2231 = $request->input('dateFromW76F2231', '');
                    $dateFromW76F2231 = \Helpers::convertDateWithFormat($dateFromW76F2231, 'Y-m-d');
                    $timeFromW76F2231 = $request->input('timeFromW76F2231', '');
                    $requestedDateFromW76F2231 = DateTime::createFromFormat('Y-m-d H:i:s', $dateFromW76F2231 . ' ' . $timeFromW76F2231 . ':00');

                    $dateToW76F2231 = $request->input('dateToW76F2231', '');
                    $dateToW76F2231 = \Helpers::convertDateWithFormat($dateToW76F2231, 'Y-m-d');
                    $timeToW76F2231 = $request->input('timeToW76F2231', '');
                    $requestedDateToW76F2231 = DateTime::createFromFormat('Y-m-d H:i:s', $dateToW76F2231 . ' ' . $timeToW76F2231 . ':00');

                    $isBlackboardW76F2231 = \Helpers::sqlNumber($request->input('isBlackboardW76F2231', 0));
                    $isProjectorW76F2231 = \Helpers::sqlNumber($request->input('isProjectorW76F2231', 0 ));
                    $isEthernetW76F2231 = \Helpers::sqlNumber($request->input('isEthernetW76F2231', 0));
                    $isPCW76F2231 = \Helpers::sqlNumber($request->input('isPCW76F2231', 0));
                    $isMicrophoneW76F2231 = \Helpers::sqlNumber($request->input('isMicrophoneW76F2231', 0));
                    $isTeleConW76F2231 = \Helpers::sqlNumber($request->input('isTeleConW76F2231', 0));
                    $isWifiW76F2231 = \Helpers::sqlNumber($request->input('isWifiW76F2231', 0));
                    $createDateW76F2231 = Carbon::now();
                    $createUserIDW76F2231 = Auth::user()->UserID;
                    $lastModifyDateW76F2231 = Carbon::now();
                    $lastModifyUserIDW76F2231 = Auth::user()->UserID;

                    //$approvalNotesW76F2231 = \Helpers::sqlstring($request->input('approvalNotesW76F2231', ''));

                    $userID = Auth::user()->UserID;
                    $divisionID = session('W76P0000')->DivisionID;
                    $lang = \Helpers::getLang();
                    $Mode = "A";
                    $ID = "";
                    $Key02ID = "";
                    $Key03ID = "";
                    $Key04ID = "";
                    $Key05ID = "";
                    $Dat03 = \Helpers::convertDate('');
                    $Dat04 = \Helpers::convertDate('');
                    $Dat05 = \Helpers::convertDate('');
                    $FormID = "W76F2230";
                    $codeTable = 1;

                    $sql = "---Kiem tra du lieu truoc khi luu--" . PHP_EOL;
                    $sql .= "EXEC W76P5555 " . PHP_EOL;
                    $sql .= "'$divisionID'," . PHP_EOL; //DivisionID, varchar[50], NOT NULL
                    $sql .= "'$lang'," . PHP_EOL; //Language, int, NOT NULL
                    $sql .= "$codeTable," . PHP_EOL; //CodeTable, int, NOT NULL
                    $sql .= "'$userID'," . PHP_EOL; //UserID, varchar[50], NOT NULL
                    $sql .= "'$Mode'," . PHP_EOL; //Mode, varchar[50], NOT NULL
                    $sql .= "'$FormID'," . PHP_EOL; //FormID, varchar[50], NOT NULL
                    $sql .= "'$cbFacilityIDW76F2231'," . PHP_EOL; //CodeID, varchar[50], NOT NULL
                    $sql .= " N'$ID'," . PHP_EOL; //Key01ID, nvarchar, NOT NULL
                    $sql .= " N'$Key02ID'," . PHP_EOL; //Key02ID, nvarchar, NOT NULL
                    $sql .= " N'$Key03ID'," . PHP_EOL; //Key03ID, nvarchar, NOT NULL
                    $sql .= " N'$Key04ID'," . PHP_EOL; //Key04ID, nvarchar, NOT NULL
                    $sql .= " N'$Key05ID'," . PHP_EOL; //Key05ID, nvarchar, NOT NULL
                    $sql .= "0," . PHP_EOL; //Num01, decimal, NOT NULL
                    $sql .= "0," . PHP_EOL; //Num02, decimal, NOT NULL
                    $sql .= "0," . PHP_EOL; //Num03, decimal, NOT NULL
                    $sql .= "0," . PHP_EOL; //Num04, decimal, NOT NULL
                    $sql .= "0," . PHP_EOL; //Num05, decimal, NOT NULL
                    $sql .= "'" . $requestedDateFromW76F2231->format('Y-m-d H:i:s') . "'," . PHP_EOL; //Dat01, datetime, NOT NULL
                    $sql .= "'" . $requestedDateToW76F2231->format('Y-m-d H:i:s') . "'," . PHP_EOL; //Dat02, datetime, NOT NULL
                    $sql .= "$Dat03," . PHP_EOL; //Dat03, datetime, NOT NULL
                    $sql .= "$Dat04," . PHP_EOL; //Dat04, datetime, NOT NULL
                    $sql .= "$Dat05" . PHP_EOL; //Dat05, datetime, NOT NULL

                    $rsCheck = DB::selectOne($sql);
                    ////\Debugbar::info($rsCheck);

                    if ($rsCheck->Status == 0) {
                        $data = [
                            "FacilityID" => $cbFacilityIDW76F2231,
                            "Description" => $descriptionW76F2231,
                            "OrgunitID" => $orgunitIDW76F2231,
                            "HostPerson" => $cbHostPersonW76F2231,
                            "Participants" => implode(';', $cbParticipantsW76F2231),
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

                           // "ApprovalNotes" => $approvalNotesW76F2231,

                        ];
                        ////\Debugbar::info($data);
                        $this->d76T2230->insert($data);
                        \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'));
                        ////\Debugbar::info($data);
                        return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'), 'redirectTo' => $_SERVER["HTTP_REFERER"]]);
                    } else {//truong hop status = 1
                        return json_encode(["status" => "EXIST", "message" => $rsCheck->Message]);
                    }
                } catch (\Exception $ex) {
                    \Helpers::log($ex->getMessage());
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }
                break;
            case 'update':
                $all = $request->input();
                $cbFacilityIDW76F2231 = \Helpers::sqlstring($request->input('cbFacilityIDW76F2231', ''));
                $descriptionW76F2231 = \Helpers::sqlstring($request->input('descriptionW76F2231', ''));
                $orgunitIDW76F2231 = \Helpers::sqlstring($request->input('orgunitIDW76F2231', ''));
                $cbHostPersonW76F2231 = \Helpers::sqlstring($request->input('cbHostPersonW76F2231', ''));
                $cbParticipantsW76F2231 = $request->input('cbParticipantsW76F2231', []);
                $txtNumParticipantsW76F22311 = \Helpers::sqlNumber($request->input('txtNumParticipantsW76F2231', 1));
                $logisticsW76F2231 = $request->input('logisticsW76F2231', []);

                $dateFromW76F2231 = $request->input('dateFromW76F2231', '');
                $dateFromW76F2231 = \Helpers::convertDateWithFormat($dateFromW76F2231, 'Y-m-d');
                $timeFromW76F2231 = $request->input('timeFromW76F2231', '');
                $requestedDateFromW76F2231 = DateTime::createFromFormat('Y-m-d H:i:s', $dateFromW76F2231 . ' ' . $timeFromW76F2231 . ':00');

                $dateToW76F2231 = $request->input('dateToW76F2231', '');
                $dateToW76F2231 = \Helpers::convertDateWithFormat($dateToW76F2231, 'Y-m-d');
                $timeToW76F2231 = $request->input('timeToW76F2231', '');
                $requestedDateToW76F2231 = DateTime::createFromFormat('Y-m-d H:i:s', $dateToW76F2231 . ' ' . $timeToW76F2231 . ':00');

                $isBlackboardW76F2231 = \Helpers::sqlNumber($request->input('isBlackboardW76F2231', 0));
                $isProjectorW76F2231 = \Helpers::sqlNumber($request->input('isProjectorW76F2231', 0));
                $isEthernetW76F2231 = \Helpers::sqlNumber($request->input('isEthernetW76F2231', 0));
                $isPCW76F2231 = \Helpers::sqlNumber($request->input('isPCW76F2231', 0));
                $isMicrophoneW76F2231 = \Helpers::sqlNumber($request->input('isMicrophoneW76F2231', 0));
                $isTeleConW76F2231 = \Helpers::sqlNumber($request->input('isTeleConW76F2231', 0));
                $isWifiW76F2231 = \Helpers::sqlNumber($request->input('isWifiW76F2231', 0));
                $createDateW76F2231 = Carbon::now();
                $createUserIDW76F2231 = Auth::user()->UserID;

                $data = [
                    "FacilityID" => $cbFacilityIDW76F2231,
                    "FacilityID" => $cbFacilityIDW76F2231,
                    "Description" => $descriptionW76F2231,
                    "OrgunitID" => $orgunitIDW76F2231,
                    "HostPerson" => $cbHostPersonW76F2231,
                    "Participants" => implode(';', $cbParticipantsW76F2231),
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
                    "LastModifyDate" => Carbon::now(),
                    "LastModifyUserID" => Auth::user()->UserID,
                ];

                try {
                    $this->d76T2230->where('ID', '=', $request->input("ID", ''))->update($data);
                    \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'));
                    return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'), 'redirectTo' => $_SERVER["HTTP_REFERER"]]);
                } catch (\Exception $ex) {
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }
                break;
            case 'updatedrag':
                $all = $request->input();
                $dateFromW76F2231 = $request->input('date', '');
                $dateFromW76F2231 = \Helpers::convertDateWithFormat($dateFromW76F2231, 'Y-m-d');
                $timeFromW76F2231 = $request->input('start', '');
                $requestedDateFromW76F2231 = DateTime::createFromFormat('Y-m-d H:i:s', $dateFromW76F2231 . ' ' . $timeFromW76F2231 . ':00');

                $dateToW76F2231 = $request->input('date', '');
                $dateToW76F2231 = \Helpers::convertDateWithFormat($dateToW76F2231, 'Y-m-d');
                $timeToW76F2231 = $request->input('end', '');
                $requestedDateToW76F2231 = DateTime::createFromFormat('Y-m-d H:i:s', $dateToW76F2231 . ' ' . $timeToW76F2231 . ':00');

                $data = [
                    "FacilityID" => $request->input('roomID', ''),
                    "RequestedDateFrom" => $requestedDateFromW76F2231,
                    "RequestedDateTo" => $requestedDateToW76F2231,
                    "LastModifyDate" => Carbon::now(),
                    "LastModifyUserID" => Auth::user()->UserID,
                ];
                try {
                    $this->d76T2230->where('ID', '=', $request->input("ID", ''))->update($data);
                    \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'));
                    return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'), 'redirectTo' => $_SERVER["HTTP_REFERER"]]);
                } catch (\Exception $ex) {
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }
                break;
            case 'updateStatus':
                $status = $request->input('status', '');
                $userID = Auth::user()->UserID;
                $approvalNotesW76F2231 = \Helpers::sqlstring($request->input('notes', ''));
                $id = $request->input("id", '');
                $data = [
                    "ApproveStatus" => $status,
                    "ApprovalNotes" => $approvalNotesW76F2231,
                    "ApprovalUser" => $userID,
                ];
                if ($status !== '') {
                    try {
                        $this->d76T2230->where('ID', $id)->update($data);
                        \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'));
                        return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'), 'redirectTo' => $_SERVER["HTTP_REFERER"]]);
                    } catch (\Exception $ex) {
                        return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                    }
                } else {
                    return json_encode(['status' => 'INVAILD', 'message' => 'Trang thai khong hop le']);
                }
                break;
        }
    }

    private function getMasterData($ID)
    {
        $result = $this->d76T2230->where("ID", "=", $ID)->first();
        $result->Logistics = explode(';', $result->Logistics);
        $result->Participants = explode(';', $result->Participants);
        return $result;
    }
}

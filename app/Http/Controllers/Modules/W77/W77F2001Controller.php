<?php

namespace App\Http\Controllers\Modules\W77;

use App\Http\Controllers\Controller;
use App\Models\D76T1556;
use App\Models\D76T2200;
use App\Models\D76T2230;
use App\Models\D76T2260;
use App\Models\D76T2261;
use App\Models\D76T2262;
use App\Models\D76T9020;
use Carbon\Carbon;
use DateTime;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class  W77F2001Controller extends Controller
{
    private $d76T1556;
    private $d76T2200;
    private $d76T2230;
    private $d76T9020;
    private $d76T2260;
    private $d76T2261;
    private $d76T2262;

    public function __construct(D76T9020 $d76T9020, D76T2260 $d76T2260, D76T2261 $d76T2261, D76T2262 $d76T2262)
    {
        $this->d76T9020 = $d76T9020;
        $this->d76T2260 = $d76T2260;
        $this->d76T2261 = $d76T2261;
        $this->d76T2262 = $d76T2262;
    }

    public function index(Request $request, $task = "")
    {
        $permission = Helpers::getPermission('W77F2001', 'W77F2001_APP');
        switch ($task) {
            case 'add':
                $all = $request->input();
                $participantsList = $this->d76T9020->select('EmployeeCode', 'Fullname')->orderBy('Fullname', 'desc')->get();

                $userID = Auth::user()->UserID;
                $divisionID = session('W76P0000')->DivisionID;
                $orgUnitID = session('W76P0000')->OrgUnitID;

                $sql = '--Do nguon cho xe và loại xe' . PHP_EOL;
                $sql .= "EXEC W77P2001 '$userID', '$orgUnitID','$divisionID'";

                $carDList = DB::select($sql);

                $carTypeList = $this->d76T2260->select('CarTypeID', 'Description AS CarTypeName')->where('Disabled', '=', 0)->orderBy('DisplayOrder', 'desc')->get();
                $carNoList = $this->d76T2261->select('CarNo', 'Description', 'CarBranch')->where('Disabled', '=', 0)->orderBy('DisplayOrder', 'desc')->get();
                // \Debugbar::info($carNoList);
                $CreateUserID = Auth::user()->UserID;
                $rowData = json_encode(array());
                return view("modules/W77/W77F2001/W77F2001", compact('permission','carDList', 'carNoList', 'carTypeList', 'participantsList', 'all', 'rowData', 'CreateUserID', 'task'));
                break;
            case 'edit':
                $all = $request->input();
                //\Debugbar::info($all);
                $CarBookingID = $request->input('carBookingID', '');
                $participantsList = $this->d76T9020->select('EmployeeCode', 'Fullname')->orderBy('Fullname', 'desc')->get();
                $carTypeList = $this->d76T2260->select('CarTypeID', 'Description AS CarTypeName')->where('Disabled', '=', 0)->orderBy('DisplayOrder', 'desc')->get();
                $carNoList = $this->d76T2261->select('CarNo', 'Description', 'CarBranch')->where('Disabled', '=', 0)->orderBy('DisplayOrder', 'desc')->get();
                //\Debugbar::info($carNoList);
                $CreateUserID = Auth::user()->UserID;
                $rowData = $this->getMasterData($CarBookingID);
                \Debugbar::info($rowData);

                $userID = Auth::user()->UserID;
                $divisionID = session('W76P0000')->DivisionID;
                $orgUnitID = session('W76P0000')->OrgUnitID;

                $sql = '--Do nguon cho xe và loại xe' . PHP_EOL;
                $sql .= "EXEC W77P2001 '$userID', '$orgUnitID','$divisionID'";

                $carDList = DB::select($sql);

                return view("modules/W77/W77F2001/W77F2001", compact('permission','carDList', 'carNoList', 'carTypeList', 'participantsList', 'all', 'rowData', 'CreateUserID', 'task'));
                break;
            case 'save':
                try {
                    $cbCarNoIDW77F2001 = \Helpers::sqlstring($request->input('cbCarNoW77F2001', ''));
                    //$cbCarTypeIDW77F2001 = \Helpers::sqlstring($request->input('cbCarTypeIDW77F2001', ''));
                    $descriptionW77F2001 = \Helpers::sqlstring($request->input('descriptionW77F2001', ''));
                    $orgunitIDW77F2001 = \Helpers::sqlstring($request->input('orgunitIDW77F2001', ''));
                    $cbParticipantsW77F2001 = $request->input('cbParticipantsW77F2001', []);
                    $txtNumParticipantsW77F20011 = \Helpers::sqlNumber($request->input('txtNumParticipantsW77F2001', 1));
                    $workPlaceW77F2001 = \Helpers::sqlstring($request->input('workPlaceW77F2001', ''));

                    $dateFromW77F2001 = $request->input('dateFromW77F2001', '');
                    $dateFromW77F2001 = \Helpers::convertDateWithFormat($dateFromW77F2001, 'Y-m-d');
                    $timeFromW77F2001 = $request->input('timeFromW77F2001', '');
                    $requestedDateFromW77F2001 = DateTime::createFromFormat('Y-m-d H:i:s', $dateFromW77F2001 . ' ' . $timeFromW77F2001 . ':00');

                    $dateToW77F2001 = $request->input('dateToW77F2001', '');
                    $dateToW77F2001 = \Helpers::convertDateWithFormat($dateToW77F2001, 'Y-m-d');
                    $timeToW77F2001 = $request->input('timeToW77F2001', '');
                    $requestedDateToW77F2001 = DateTime::createFromFormat('Y-m-d H:i:s', $dateToW77F2001 . ' ' . $timeToW77F2001 . ':00');

                    $createDateW77F2001 = Carbon::now();
                    $createUserIDW77F2001 = Auth::user()->UserID;
                    $lastModifyDateW77F2001 = Carbon::now();
                    $lastModifyUserIDW77F2001 = Auth::user()->UserID;


                    $userID = Auth::user()->UserID;
                    $divisionID = session('W76P0000')->DivisionID;
                    $lang = \Helpers::getLang();
                    $Mode = "A";
                    $carBookingID = "";
                    $Key01ID = "";
                    $Key02ID = "";
                    $Key03ID = "";
                    $Key04ID = "";
                    $Key05ID = "";
                    $Dat03 = \Helpers::convertDate('');
                    $Dat04 = \Helpers::convertDate('');
                    $Dat05 = \Helpers::convertDate('');
                    $FormID = "W77F2000";
                    $codeTable = 1;

                    $sql = "---Kiem tra du lieu truoc khi luu--" . PHP_EOL;
                    $sql .= "EXEC W76P5555 " . PHP_EOL;
                    $sql .= "'$divisionID'," . PHP_EOL; //DivisionID, varchar[50], NOT NULL
                    $sql .= "'$lang'," . PHP_EOL; //Language, int, NOT NULL
                    $sql .= "$codeTable," . PHP_EOL; //CodeTable, int, NOT NULL
                    $sql .= "'$userID'," . PHP_EOL; //UserID, varchar[50], NOT NULL
                    $sql .= "'$Mode'," . PHP_EOL; //Mode, varchar[50], NOT NULL
                    $sql .= "'$FormID'," . PHP_EOL; //FormID, varchar[50], NOT NULL
                    $sql .= "'$carBookingID'," . PHP_EOL; //CodeID, varchar[50], NOT NULL
                    $sql .= " N'$Key01ID'," . PHP_EOL; //Key01ID, nvarchar, NOT NULL
                    $sql .= " N'$Key02ID'," . PHP_EOL; //Key02ID, nvarchar, NOT NULL
                    $sql .= " N'$Key03ID'," . PHP_EOL; //Key03ID, nvarchar, NOT NULL
                    $sql .= " N'$Key04ID'," . PHP_EOL; //Key04ID, nvarchar, NOT NULL
                    $sql .= " N'$Key05ID'," . PHP_EOL; //Key05ID, nvarchar, NOT NULL
                    $sql .= "0," . PHP_EOL; //Num01, decimal, NOT NULL
                    $sql .= "0," . PHP_EOL; //Num02, decimal, NOT NULL
                    $sql .= "0," . PHP_EOL; //Num03, decimal, NOT NULL
                    $sql .= "0," . PHP_EOL; //Num04, decimal, NOT NULL
                    $sql .= "0," . PHP_EOL; //Num05, decimal, NOT NULL
                    $sql .= "'" . $requestedDateFromW77F2001->format('Y-m-d H:i:s') . "'," . PHP_EOL; //Dat01, datetime, NOT NULL
                    $sql .= "'" . $requestedDateToW77F2001->format('Y-m-d H:i:s') . "'," . PHP_EOL; //Dat02, datetime, NOT NULL
                    $sql .= "$Dat03," . PHP_EOL; //Dat03, datetime, NOT NULL
                    $sql .= "$Dat04," . PHP_EOL; //Dat04, datetime, NOT NULL
                    $sql .= "$Dat05" . PHP_EOL; //Dat05, datetime, NOT NULL

                    $rsCheck = DB::selectOne($sql);
                    // \Debugbar::info($rsCheck);

                    if ($rsCheck->Status == 0) {
                        $data = [
                            "CarNo" => $cbCarNoIDW77F2001,
                            "Description" => $descriptionW77F2001,
                            "OrgunitID" => $orgunitIDW77F2001,
                            "Participants" => implode(';', $cbParticipantsW77F2001),
                            "NumParticipants" => $txtNumParticipantsW77F20011,
                            "WorkPlace" => $workPlaceW77F2001,
                            "RequestedDateFrom" => $requestedDateFromW77F2001,
                            "RequestedDateTo" => $requestedDateToW77F2001,
                            "CreateDate" => $createDateW77F2001,
                            "CreateUserID" => $createUserIDW77F2001,
                            "LastModifyDate" => $lastModifyDateW77F2001,
                            "LastModifyUserID" => $lastModifyUserIDW77F2001,
                        ];
                        //\Debugbar::info($data);
                        $this->d76T2262->insert($data);
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
                try {
                    // $CarBookingID = $request->input('carBookingID', '');
                    $cbCarNoIDW77F2001 = \Helpers::sqlstring($request->input('cbCarNoW77F2001', ''));
                    $descriptionW77F2001 = \Helpers::sqlstring($request->input('descriptionW77F2001', ''));
                    $orgunitIDW77F2001 = \Helpers::sqlstring($request->input('orgunitIDW77F2001', ''));
                    $cbParticipantsW77F2001 = $request->input('cbParticipantsW77F2001', []);
                    $txtNumParticipantsW77F2001 = \Helpers::sqlNumber($request->input('txtNumParticipantsW77F2001', 1));
                    $workPlaceW77F2001 = \Helpers::sqlstring($request->input('workPlaceW77F2001', ''));

                    $dateFromW77F2001 = $request->input('dateFromW77F2001', '');
                    $dateFromW77F2001 = \Helpers::convertDateWithFormat($dateFromW77F2001, 'Y-m-d');
                    $timeFromW77F2001 = $request->input('timeFromW77F2001', '');
                    $requestedDateFromW77F2001 = DateTime::createFromFormat('Y-m-d H:i:s', $dateFromW77F2001 . ' ' . $timeFromW77F2001 . ':00');

                    $dateToW77F2001 = $request->input('dateToW77F2001', '');
                    $dateToW77F2001 = \Helpers::convertDateWithFormat($dateToW77F2001, 'Y-m-d');
                    $timeToW77F2001 = $request->input('timeToW77F2001', '');
                    $requestedDateToW77F2001 = DateTime::createFromFormat('Y-m-d H:i:s', $dateToW77F2001 . ' ' . $timeToW77F2001 . ':00');

                    $createDateW77F2001 = Carbon::now();
                    $createUserIDW77F2001 = Auth::user()->UserID;
                    $lastModifyDateW77F2001 = Carbon::now();
                    $lastModifyUserIDW77F2001 = Auth::user()->UserID;

                    $data = [
                        "CarNo" => $cbCarNoIDW77F2001,
                        "Description" => $descriptionW77F2001,
                        "OrgunitID" => $orgunitIDW77F2001,
                        "Participants" => implode(';', $cbParticipantsW77F2001),
                        "NumParticipants" => $txtNumParticipantsW77F2001,
                        "WorkPlace" => $workPlaceW77F2001,
                        "RequestedDateFrom" => $requestedDateFromW77F2001,
                        "RequestedDateTo" => $requestedDateToW77F2001,
                        "CreateDate" => $createDateW77F2001,
                        "CreateUserID" => $createUserIDW77F2001,
                        "LastModifyDate" => $lastModifyDateW77F2001,
                        "LastModifyUserID" => $lastModifyUserIDW77F2001,
                    ];
                    //\Debugbar::info($data);
                    $this->d76T2262->where('CarBookingID', '=', $request->input('CarBookingID', ''))->update($data);

                    \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'));
                    ////\Debugbar::info($data);
                    return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'), 'redirectTo' => $_SERVER["HTTP_REFERER"]]);
                } catch (\Exception $ex) {
                    \Helpers::log($ex->getMessage());
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }
                break;
            case 'updatedrag':
                $dateFromW77F2001 = $request->input('date', '');
                $dateFromW77F2001 = \Helpers::convertDateWithFormat($dateFromW77F2001, 'Y-m-d');
                $timeFromW77F2001 = $request->input('start', '');
                $requestedDateFromW77F2001 = DateTime::createFromFormat('Y-m-d H:i:s', $dateFromW77F2001 . ' ' . $timeFromW77F2001 . ':00');

                $dateToW77F2001 = $request->input('date', '');
                $dateToW77F2001 = \Helpers::convertDateWithFormat($dateToW77F2001, 'Y-m-d');
                $timeToW77F2001 = $request->input('end', '');
                $requestedDateToW77F2001 = DateTime::createFromFormat('Y-m-d H:i:s', $dateToW77F2001 . ' ' . $timeToW77F2001 . ':00');

                $lastModifyDateW77F2001 = Carbon::now();
                $lastModifyUserIDW77F2001 = Auth::user()->UserID;

                $data = [
                    "CarNo" => $request->input('carNo', ''),
                    "RequestedDateFrom" => $requestedDateFromW77F2001,
                    "RequestedDateTo" => $requestedDateToW77F2001,
                    "LastModifyDate" => $lastModifyDateW77F2001,
                    "LastModifyUserID" => $lastModifyUserIDW77F2001,
                ];
                \Debugbar::info($data);
                try {
                    $this->d76T2262->where('CarBookingID', '=', $request->input('carBookingID', ''))->update($data);
                    \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'));
                    return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'), 'redirectTo' => $_SERVER["HTTP_REFERER"]]);
                } catch (\Exception $ex) {
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                    //\Debugbar::info($data);
                }
                break;
            case 'updateStatus':
                $status = $request->input('status', '');
                $userID = Auth::user()->UserID;
                $approvalNotesW77F2001 = \Helpers::sqlstring($request->input('notes', ''));
                $carBookingID = $request->input("carBookingID", '');
                $data = [
                    "ApproveStatus" => $status,
                    "ApprovalNotes" => $approvalNotesW77F2001,
                    "ApprovalUser" => $userID,
                ];
                if ($status !== '') {
                    try {
                        $this->d76T2262->where('CarBookingID', $carBookingID)->update($data);
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

    function getMasterData($CarBookingID)
    {
        $result = $this->d76T2262->where("CarBookingID", "=", $CarBookingID)->first();

        $carInfo = $this->d76T2261->where('CarNo', $result->CarNo)->first();
        //\Debugbar::info($result);
        $result->Participants = explode(';', $result->Participants);
        $result->CarTypeID = $carInfo->CarTypeID;
        return $result;
    }
}

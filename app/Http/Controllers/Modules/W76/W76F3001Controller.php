<?php

namespace App\Http\Controllers\Modules\W76;

use App\Http\Controllers\Controller;
use App\Models\D76T1556;
use App\Models\D76T2140;
use App\Models\D76T2141;
use App\Models\D76T2280;
use App\Models\D76T2281;
use App\Models\D76T2282;
use App\Models\D76T2300;
use App\Models\D76T2301;
use App\Models\D76T9010;
use App\Models\D76T9020;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class  W76F3001Controller extends Controller
{
    private $d76T9010;
    private $d76T9020;

    public function __construct(D76T9010 $d76T9010, D76T9020 $d76T9020)
    {

        $this->d76T9010 = $d76T9010;
        $this->d76T9020 = $d76T9020;
    }

    public function index($task = "", Request $request)
    {
        $title = Helpers::getRS("Quan_tri_he_thong");

//        return view("modules/W76/W76F3001/W76F3001", compact('title', 'task'));
        switch ($task) {
            case 'add':
                $UserID = Auth::user()->UserID;
                $divisionID = session('W76P0000')->DivisionID;
                $orgUnitID = session('W76P0000')->OrgUnitID;
                $mode = 1;
                /*Do nguon chuc danh cong viec*/
                $positionIDList = $this->d76T9010->select('PositionID', 'PositionName', 'OrgunitID')->where('Disabled', "=", 0)->orderBy('PositionName', 'desc')->get();
                /**/

                /*Co cau to chuc*/
                $sql = '--Do nguon cho co cau to chuc' . PHP_EOL;
                $sql .= "EXEC W76P9000 '$UserID','$divisionID','$orgUnitID','$mode'";
                $orgunitList = DB::select($sql);
                /**/

                /*Nguoi quan ly truc tiep*/
                $sql = '--Do nguon cho nguoi quan ly truc tiep' . PHP_EOL;
                $sql .= "EXEC W76P9020 '$divisionID', 'EMP'";
                $supervisorList = DB::select($sql);
                /**/

                /*Nguoi quan ly cap cao*/
                $sql = '--Do nguon cho nguoi quan ly cap cao' . PHP_EOL;
                $sql .= "EXEC W76P9020 '$divisionID', 'EMP'";
                $highExecutiveList = DB::select($sql);
                /**/
                $rowData = json_encode(array());
                \Debugbar::info("row", $rowData);
                return view("modules/W76/W76F3001/W76F3001", compact('rowData', 'orgunitList', 'highExecutiveList', 'supervisorList', 'positionIDList', 'title', 'task'));
                break;
            case 'edit':
                $UserID = Auth::user()->UserID;
                $divisionID = session('W76P0000')->DivisionID;
                $orgUnitID = session('W76P0000')->OrgUnitID;
                $mode = 1;
                /*Do nguon chuc danh cong viec*/
                $positionIDList = $this->d76T9010->select('PositionID', 'PositionName', 'OrgunitID')->where('Disabled', "=", 0)->orderBy('PositionName', 'desc')->get();
                /**/

                /*Co cau to chuc*/
                $sql = '--Do nguon cho co cau to chuc' . PHP_EOL;
                $sql .= "EXEC W76P9000 '$UserID','$divisionID','$orgUnitID','$mode'";
                $orgunitList = DB::select($sql);
                /**/

                /*Nguoi quan ly truc tiep*/
                $sql = '--Do nguon cho nguoi quan ly truc tiep' . PHP_EOL;
                $sql .= "EXEC W76P9020 '$divisionID', 'EMP'";
                $supervisorList = DB::select($sql);
                /**/

                /*Nguoi quan ly cap cao*/
                $sql = '--Do nguon cho nguoi quan ly cap cao' . PHP_EOL;
                $sql .= "EXEC W76P9020 '$divisionID', 'EMP'";
                $highExecutiveList = DB::select($sql);
                //\Debugbar::info($highExecutiveList);
                /**/

                $employeeID = $request->input('employeeID', '');
                /*Co cau to chuc*/
                $sql = '--Do nguon cho chi tiet tai khoan nhan vien' . PHP_EOL;
                $sql .= "EXEC W76P3004 '$employeeID'";
                $detailAccount = DB::selectOne($sql);
//                foreach ($detailAccount as &$item) {
//                    if ($item->Thumnail == "") {
//                        $item->Thumnail = asset('media/available.png');
//                    } else {
//                        $item->Thumnail = 'data:image/jpeg;base64,' . base64_encode($item->Thumnail);
//                    }
//                }
                $rowData = ($detailAccount);

                return view("modules/W76/W76F3001/W76F3001", compact('rowData', 'detailAccount', 'orgunitList', 'highExecutiveList', 'supervisorList', 'positionIDList', 'title', 'task'));
                break;
            case'save':
                try {
                    $employeeCodeW76F3001 = \Helpers::sqlstring($request->input('employeeCodeW76F3001', ''));
                    $familyNameW76F3001 = \Helpers::sqlstring($request->input('familyNameW76F3001', ''));
                    $middleNameW76F3001 = \Helpers::sqlstring($request->input('middleNameW76F3001', ''));
                    $firstNameW76F3001 = \Helpers::sqlstring($request->input('firstNameW76F3001', ''));
                    $birthDate1W76F3001 = \Helpers::createDateTime($request->input('birthDate1W76F3001', ''));
                    $addressW76F3001 = \Helpers::sqlstring($request->input('addressW76F3001', ''));
                    $genderW76F3001 = \Helpers::sqlNumber($request->input('genderW76F3001', 0));
                    $emailW76F3001 = \Helpers::sqlstring($request->input('emailW76F3001', ''));
                    $email2W76F3001 = \Helpers::sqlstring($request->input('email2W76F3001', ''));
                    $workPhoneW76F3001 = \Helpers::sqlstring($request->input('workPhoneW76F3001', ''));
                    $mobilePhoneW76F3001 = \Helpers::sqlstring($request->input('mobilePhoneW76F3001', ''));
                    $startDateW76F3001 = \Helpers::createDateTime($request->input('startDateW76F3001', ''));

                    $positionIDW76F3001 = \Helpers::sqlstring($request->input('positionIDW76F3001', ''));
                    $orgunitIDW76F3001 = \Helpers::sqlstring($request->input('orgunitIDW76F3001', ''));
                    $highExecutiveIDW76F3001 = \Helpers::sqlstring($request->input('highExecutiveIDW76F3001', ''));
                    $supervisorIDW76F3001 = \Helpers::sqlstring($request->input('supervisorIDW76F3001', ''));

                    $createDateW76F3001 = Carbon::now();
                    $createUserIDW76F3001 = Auth::user()->UserID;
                    $data = [
                        "EmployeeCode" => $employeeCodeW76F3001,
                        "HighExecutiveID" => $highExecutiveIDW76F3001,
                        "SupervisorID" => $supervisorIDW76F3001,
                        "OrgunitID" => $orgunitIDW76F3001,
                        "PositionID" => $positionIDW76F3001,
                        "Gender" => $genderW76F3001,
                        "FamilyName" => $familyNameW76F3001,
                        "MiddleName" => $middleNameW76F3001,
                        "FirstName" => $firstNameW76F3001,
                        "StartDate" => $startDateW76F3001,
                        "Email" => $emailW76F3001,
                        "BirthDate" => $birthDate1W76F3001,
                        "Address" => $addressW76F3001,
                        "Email2" => $email2W76F3001,
                        "WorkPhone" => $workPhoneW76F3001,
                        "MobilePhone" => $mobilePhoneW76F3001,
                        "CreateUserID" => $createUserIDW76F3001,
                        "CreateDate" => $createDateW76F3001,
                    ];
                    $this->d76T9020->insert($data);
                    \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'));
                    ////\Debugbar::info($data);
                    return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'), 'redirectTo' => $_SERVER["HTTP_REFERER"]]);
                } catch (\Exception $ex) {
                    \Helpers::log($ex->getMessage());
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }
                break;

//            case 'update':
//                try {
//                    $EmployeeCode = $request->input('EmployeeCode', '');
//                    //$employeeCodeW76F3001 = \Helpers::sqlstring($request->input('employeeCodeW76F3001', ''));
//                    $familyNameW76F3001 = \Helpers::sqlstring($request->input('familyNameW76F3001', ''));
//                    $middleNameW76F3001 = \Helpers::sqlstring($request->input('middleNameW76F3001', ''));
//                    $firstNameW76F3001 = \Helpers::sqlstring($request->input('firstNameW76F3001', ''));
//                    $birthDate1W76F3001 = \Helpers::createDateTime($request->input('birthDate1W76F3001', ''));
//                    $addressW76F3001 = \Helpers::sqlstring($request->input('addressW76F3001', ''));
//                    $userIDW76F3001 = \Helpers::sqlstring($request->input('userIDW76F3001', ''));
//                    $genderW76F3001 = \Helpers::sqlNumber($request->input('genderW76F3001', 0));
//                    $emailW76F3001 = \Helpers::sqlstring($request->input('emailW76F3001', ''));
//                    $email2W76F3001 = \Helpers::sqlstring($request->input('email2W76F3001', ''));
//                    $workPhoneW76F3001 = \Helpers::sqlstring($request->input('workPhoneW76F3001', ''));
//                    $mobilePhoneW76F3001 = \Helpers::sqlstring($request->input('mobilePhoneW76F3001', ''));
//                    $startDateW76F3001 = \Helpers::createDateTime($request->input('startDateW76F3001', ''));
//
//                    $positionIDW76F3001 = \Helpers::sqlstring($request->input('positionIDW76F3001', ''));
//                    $orgunitIDW76F3001 = \Helpers::sqlstring($request->input('orgunitIDW76F3001', ''));
//                    $highExecutiveIDW76F3001 = \Helpers::sqlstring($request->input('highExecutiveIDW76F3001', ''));
//                    $supervisorIDW76F3001 = \Helpers::sqlstring($request->input('supervisorIDW76F3001', ''));
//
//                    $lastModifyDateW76F3001 = Carbon::now();
//                    $lastModifyUserIDW76F3001 = Auth::user()->UserID;
//                    $data = [
//                        //"EmployeeCode" => $employeeCodeW76F3001,
//                        "HighExecutiveID" => $highExecutiveIDW76F3001,
//                        "SupervisorID" => $supervisorIDW76F3001,
//                        "OrgunitID" => $orgunitIDW76F3001,
//                        "PositionID" => $positionIDW76F3001,
//                        "Gender" => $genderW76F3001,
//                        "FamilyName" => $familyNameW76F3001,
//                        "MiddleName" => $middleNameW76F3001,
//                        "FirstName" => $firstNameW76F3001,
//                        "StartDate" => $startDateW76F3001,
//                        "Email" => $emailW76F3001,
//                        "BirthDate" => $birthDate1W76F3001,
//                        "Address" => $addressW76F3001,
//                        "Email2" => $email2W76F3001,
//                        "WorkPhone" => $workPhoneW76F3001,
//                        "MobilePhone" => $mobilePhoneW76F3001,
//                        "LastModifyDate" => $lastModifyDateW76F3001,
//                        "LastModifyUserID" => $lastModifyUserIDW76F3001,
//                    ];
//                    $this->d76T9020->where('EmployeeCode', '=', $EmployeeCode)->update($data);
//                    \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'));
//                    ////\Debugbar::info($data);
//                    return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'), 'redirectTo' => $_SERVER["HTTP_REFERER"]]);
//                } catch (\Exception $ex) {
//                    \Helpers::log($ex->getMessage());
//                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
//                }
//                break;
        }
    }
    function getMasterData()
    {
        $userID = Auth::user()->UserID;
        /*Co cau to chuc*/
        $sql = '--Do nguon cho chi tiet tai khoan nhan vien' . PHP_EOL;
        $sql .= "EXEC W76P3004 '$userID'";
        $detailAccount = DB::selectOne($sql);
        //var_dump($detailAccount);die();
        return $detailAccount;
        // \Debugbar::info("do nguon", $detailAccount);
    }


}

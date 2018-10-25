<?php

namespace App\Http\Controllers\Modules\W77;

use App\Http\Controllers\Controller;
use App\Models\D76T2260;
use App\Models\D76T2261;
use Carbon\Carbon;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class  W77F1001Controller extends Controller
{
    /**
     * @Notes: Action Danh muc xe cong tac
     * @Author: TRIHAO
     * @Date: 26/09/2018
     */
    public function __construct()
    {

    }

    public function index(Request $request, $task = '')
    {
        $title = Helpers::getRS("Cap_nhat_xe_cong_tac");

        switch ($task) {
            case 'add':
                $divisionID = session('W76P0000')->DivisionID;
                $carTypes = D76T2260::select('CarTypeID', 'Description')->orderBy('DisplayOrder')->get();

                $sql = "-- Do nguon tai xe" . PHP_EOL;
                $sql .= "EXEC W76P9020 '$divisionID', 'DRIVER'";
                $carDrivers = DB::select($sql);

                return view("modules/W77/W77F1001/W77F1001", compact('title', 'carTypes', 'carDrivers', 'task'));
                break;
            case 'edit':
                $carNo = $request->input('carNo', '');
                $rowData = D76T2261::where('CarNo', $carNo)->first();

                $divisionID = session('W76P0000')->DivisionID;
                $carTypes = D76T2260::select('CarTypeID', 'Description')->orderBy('DisplayOrder')->get();

                $sql = "-- Do nguon tai xe" . PHP_EOL;
                $sql .= "EXEC W76P9020 '$divisionID', 'DRIVER'";
                $carDrivers = DB::select($sql);

                return view("modules/W77/W77F1001/W77F1001", compact('title', 'carTypes', 'carDrivers', 'rowData', 'task'));
                break;
            case 'save':
                try {
                    $data = [];
                    $carNo = \Helpers::sqlstring($request->input('txtCarNoW77F1001', ''));
                    $isExist = D76T2261::where('CarNo', $carNo)->exists();
                    if (!$isExist) {
                        $data['CarNo'] = $carNo;
                        $data['CarBranch'] = \Helpers::sqlstring($request->input('txtCarBranchW77F1001', ''));
                        $data['Description'] = \Helpers::sqlstring($request->input('txtDescriptionW77F1001', ''));
                        $data['CarTypeID'] = \Helpers::sqlstring($request->input('slCarTypeW77F1001', ''));
                        $data['Driver'] = \Helpers::sqlstring($request->input('slCarDriverW77F1001', ''));
                        $data['Disabled'] = \Helpers::sqlNumber($request->input('chkDisabledW77F1001', 0) == 0 ? 0 : 1);
                        $data['DisplayOrder'] = \Helpers::sqlNumber($request->input('displayOrderW77F1001', 0));
                        $data['CreateDate'] = Carbon::now();
                        $data['CreateUserID'] = Auth::id();

                        D76T2261::insert($data);

                        \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'));
                        return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'), 'redirectTo' => $_SERVER["HTTP_REFERER"]]);
                    } else {
                        return json_encode(["status" => "EXIST", "message" => \Helpers::getRS('So_xe_nay_da_ton_tai_ban_khong_duoc_phep_luu')]);
                    }
                } catch (\Exception $ex) {
                    \Helpers::log($ex->getMessage());
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }
                break;
            case 'update':
                try {
                    $data = [];
                    $carNo = \Helpers::sqlstring($request->input('hdCarNoW77F1001', ''));
                    $isExist = D76T2261::where('CarNo', $carNo)->exists();
                    if ($isExist) {
                        $data['CarBranch'] = \Helpers::sqlstring($request->input('txtCarBranchW77F1001', ''));
                        $data['Description'] = \Helpers::sqlstring($request->input('txtDescriptionW77F1001', ''));
                        $data['CarTypeID'] = \Helpers::sqlstring($request->input('slCarTypeW77F1001', ''));
                        $data['Driver'] = \Helpers::sqlstring($request->input('slCarDriverW77F1001', ''));
                        $data['Disabled'] = \Helpers::sqlNumber($request->input('chkDisabledW77F1001', 0) == 0 ? 0 : 1);
                        $data['DisplayOrder'] = \Helpers::sqlNumber($request->input('displayOrderW77F1001', 0));
                        $data['LastModifyDate'] = Carbon::now();
                        $data['LastModifyUserID'] = Auth::id();

                        D76T2261::where('CarNo', $carNo)->update($data);

                        \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'));
                        return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'), 'redirectTo' => $_SERVER["HTTP_REFERER"]]);
                    } else {
                        return json_encode(["status" => "EXIST", "message" => \Helpers::getRS('So_xe_nay_khong_ton_tai_ban_khong_duoc_phep_cap_nhat')]);
                    }
                } catch (\Exception $ex) {
                    \Helpers::log($ex->getMessage());
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }
                break;
            case 'delete':
                try {
                    $carNo = $request->input('carNo', '');
                    $isExist = D76T2261::where('CarNo', $carNo)->exists();
                    if ($isExist) {
                        D76T2261::where('CarNo', $carNo)->delete();

                        \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_xoa_thanh_cong'));
                        return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_xoa_thanh_cong'), 'redirectTo' => $_SERVER["HTTP_REFERER"]]);
                    } else {
                        return json_encode(["status" => "EXIST", "message" => \Helpers::getRS('So_xe_nay_khong_ton_tai_ban_khong_duoc_phep_xoa')]);
                    }
                } catch (\Exception $ex) {
                    \Helpers::log($ex->getMessage());
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }
                break;

        }
    }

}




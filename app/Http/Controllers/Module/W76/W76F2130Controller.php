<?php

namespace App\Http\Controllers\Module\W76;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class  W76F2130Controller extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request, $task = '')
    {
        switch ($task){
            case '':
            case 'fileter':
            $sql = "-- Do nguon cho luoi truy van" . PHP_EOL;
            $UserID = Auth::user()->UserID;
            $StrSearch = '';
            $EffectDateFrom1 = \Helpers::convertDate($request->input('txtEffectDateFrom1', ''));
            $EffectDateFrom2 = \Helpers::convertDate($request->input('txtEffectDateFrom2', ''));
            $EffectDateTo1 = \Helpers::convertDate($request->input('txtEffectDateTo1', ''));
            $EffectDateTo2 = \Helpers::convertDate($request->input('txtEffectDateTo2', ''));
            $sql = "--Do nguon cho luoi truy van" . PHP_EOL;
            $sql .= "EXEC W76P2131 " . PHP_EOL;
            $sql .= "'$UserID'," . PHP_EOL; //UserID, varchar[50], NOT NULL
            $sql .= " N'$StrSearch'," . PHP_EOL; //StrSearch, nvarchar, NOT NULL
            $sql .= "$EffectDateFrom1," . PHP_EOL; //EffectDateFrom1, datetime, NOT NULL
            $sql .= "$EffectDateFrom2," . PHP_EOL; //EffectDateFrom2, datetime, NOT NULL
            $sql .= "$EffectDateTo1," . PHP_EOL; //EffectDateTo1, datetime, NOT NULL
            $sql .= "$EffectDateTo2"; //, datetime, NOT NULL
            $rsData = DB::select($sql);
            $rsData = json_encode($rsData);
            return view("system/module/W76/W76F2130/W76F2130", compact('rsData'));
                break;
            case "delete":
                $ID = $request->input('ID', '');
                $sql = "--Xoa hop dong".PHP_EOL;
                $sql .= "delete from D76T2130 where ID = $ID".PHP_EOL;
                try {
                    DB::statement($sql);
                    \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_xoa_thanh_cong'));
                    return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_xoa_thanh_cong')]);
                } catch (\Exception $ex) {
                    \Helpers::log($ex->getMessage());
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }
                break;
                break;
        }

    }

}




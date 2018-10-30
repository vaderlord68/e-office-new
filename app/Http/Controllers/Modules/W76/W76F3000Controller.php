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
use App\Models\D76T9020;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class  W76F3000Controller extends Controller
{

    public function index($task = "", Request $request)
    {
        $title = Helpers::getRS("Quan_tri_he_thong");
        switch ($task) {
            case'':
                $employeeID = $request->input('EmployeeID', '');
                $divisionID = session('W76P0000')->DivisionID;
                $orgUnitID = session('W76P0000')->OrgUnitID;
                $StrSearch = $request->input('txtSearchValueW84TaskList', '');

                /*Co cau to chuc*/
                $sql = '--Do nguon cho danh sach tai khoan' . PHP_EOL;
                $sql .= "EXEC W76P3000 '$employeeID','$orgUnitID','$divisionID','$StrSearch'";
                $accountList = DB::select($sql);
                \Debugbar::info($accountList);
                foreach ($accountList as &$item) {
                    if ($item->Thumnail == "") {
                        $item->Thumnail = asset('media/available.png');
                    } else {
                        $item->Thumnail = 'data:image/jpeg;base64,' . base64_encode($item->Thumnail);
                    }
                }
                $total = count($accountList); //Tong so page
                $perpage = 18; //so luong item tren page
                $currentPage = $request->input('page', 1); //page hien tai
                $pages = 18; //So page se hien thi
                $from = $perpage * ($currentPage - 1);

                $to = $perpage;
//                \Debugbar::info($accountList);
//                \Debugbar::info($from);
//                \Debugbar::info($to);
                $accountList = array_splice($accountList, $from, $to);
                /**/
                return view("modules/W76/W76F3000/W76F3000", compact('currentPage', 'pages', 'total', 'accountList', 'title', 'task'));
                break;
        }


    }


}

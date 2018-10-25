<?php

namespace App\Http\Controllers\Modules\W86;

use App\Http\Controllers\Controller;
use App\Models\D76T2140;
use App\Models\D76T2141;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class  W86F1000Controller extends Controller
{
    public function index(Request $request, $component = '')
    {
        $title= Helpers::getRS('Danh_ba_dien_thoaiU');
        switch ($component) {
            case'':
                $organizationList = $this->getOrganizationList();
                foreach ($organizationList as &$r) {
                    if ($r->OrgunitParentID == $r->OrgunitID) {
                        unset($r->OrgunitParentID);
                        $r->expanded = true; //list con
                    } else {
                        $r->expanded = false;
                    }
                }
                $organizationList = json_encode($organizationList);
                \Debugbar::info($organizationList);
                return view("modules/W86/W86F1000/components/layout", compact('title','organizationList'));
                break;
            case 'employeeList':
                $StrSearch = $request->input('txtSearchValueW86F1000', '');
                $orgunitID = Input::get('orgunitID', '');
                $employeeList = $this->getEmployeeList($orgunitID,$StrSearch);
                \Debugbar::info($employeeList);
                return view("modules/W86/W86F1000/W86F1000", compact('title','orgunitID','employeeList'));
                break;
        }
    }

    function getOrganizationList()
    {
        $userID = Auth::user()->UserID;
        $divisionID = session('W76P0000')->DivisionID;
        $orgUnitID = session('W76P0000')->OrgUnitID;
        $Mode = 1;

        $sql = '--Do nguon cho so do to chuc' . PHP_EOL;
        $sql .= "EXEC W76P9000 '$userID','$divisionID', '$orgUnitID','$Mode'";
        $organizationList = DB::select($sql);
        \Debugbar::info($organizationList);

        return $organizationList;
    }

    function getEmployeeList($orgUnitID,$StrSearch)
    {
        $userID = Auth::user()->UserID;
        $divisionID = session('W76P0000')->DivisionID;

        $sql = '--Do nguon cho nhan vien' . PHP_EOL;
        $sql .= "EXEC W86P1000'$userID','$divisionID', '$orgUnitID','$StrSearch'";
        $employeeList = DB::select($sql);
        \Debugbar::info($employeeList);
        foreach ($employeeList as &$item) {
            if ($item->Image == "") {
                $item->Image = asset('media/available.png');
            } else {
                $item->Image = 'data:image/jpeg;base64,' . base64_encode($item->Image);
            }
        }
        return $employeeList;
    }
}

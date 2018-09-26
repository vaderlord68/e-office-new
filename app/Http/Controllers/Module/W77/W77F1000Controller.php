<?php

namespace App\Http\Controllers\Module\W77;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTime;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use SplFileInfo;

class  W77F1000Controller extends Controller
{
    /**
     * @Notes: Danh muc xe cong tac
     * @Author: TRIHAO
     * @Date: 26/09/2018
     */
    public function __construct() {

    }

    public function index(Request $request, $task = '') {

        $title = "Danh mục xe công tác";
        $rsData = $this->getLists();
        \Debugbar::info($rsData);
        return view("system/module/W77/W77F1000/W77F1000", compact('title', 'rsData'));
    }

    public function getLists() {
        $userID = Auth::id();
        $divisionID = session('W76P0000')->DivisionID;
        $orgUnitID = session('W76P0000')->OrgUnitID;
        $sql = '--Do nguon cho luoi'.PHP_EOL;
        $sql .= "EXEC W77P1000 '$userID', '$divisionID', '$orgUnitID'";
        $collection = DB::select($sql);

        return $collection ;
    }

}




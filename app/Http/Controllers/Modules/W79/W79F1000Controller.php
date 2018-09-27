<?php

namespace App\Http\Controllers\Modules\W79;

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

class  W79F1000Controller extends Controller
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
//        \Debugbar::info($rsData);
        return view("modules/W79/W79F1000/W79F1000", compact('title', 'rsData'));
    }

}




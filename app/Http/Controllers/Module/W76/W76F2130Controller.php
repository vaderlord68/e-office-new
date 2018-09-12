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
        return view("system/module/W76/W76F2130/W76F2130");
    }

}




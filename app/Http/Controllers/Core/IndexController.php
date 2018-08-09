<?php

namespace App\Http\Controllers\Core;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;

class  IndexController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        if (Helper::isAUserInSession()) {
//            return redirect("/bi");
            return view('system/landing');
        } else {
            return view('user/login');
        }
    }
}

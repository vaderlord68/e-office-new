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
//        Helper::test();
        if (Helper::isAUserInSession()) {
            return view('system/landing');
        } else {
            return view('user/login');
        }
    }
}

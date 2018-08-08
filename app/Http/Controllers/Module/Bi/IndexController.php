<?php

namespace App\Http\Controllers\Module\Bi;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;


class  IndexController extends Controller
{
    public function index()
    {
        if (Helper::isAUserInSession()) {
            return view('system/module/bi');
        } else {
            return view('user/login');
        }
    }
}

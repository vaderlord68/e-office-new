<?php

namespace App\Http\Controllers\Core;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class  IndexController extends Controller
{
    public function index()
    {
        //return view('system/landing');
        return Redirect::to('/W76F2142');
        //return view('modules.index');
    }
}

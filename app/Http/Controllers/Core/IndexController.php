<?php

namespace App\Http\Controllers\Core;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class  IndexController extends Controller
{
    public function index()
    {
        return view('system/landing');
        //return view('index');
    }
}

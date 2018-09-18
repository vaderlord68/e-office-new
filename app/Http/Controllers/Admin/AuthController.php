<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $title = "Dashboard";
        return view('admin.W00F0000', compact('title'));
    }

    public function login($task = '')
    {
        //return view('admin.index');
    }

    public function logout($task = '')
    {
        //return view('admin.index');
    }
}

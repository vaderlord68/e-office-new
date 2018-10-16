<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class W00F0003Controller extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $task = '')
    {
        switch ($task) {
            case "":

                $arrEnv = \Helpers::getEnv();
                //\Debugbar::info($arrEnv);
                $title = "Environment Setting";
                return view('admin.W00F0003', compact('arrEnv','title'));
            case "update":
                $all = $request->input();
                //var_dump($all);
                //\Debugbar::info($all);
                $env_update = \Helpers::changeEnv($all);
                if ($env_update) {
                    //Auth::user()->logout();
                    //Session::flush();
                    Artisan::call('config:clear');
                    return json_encode(['status' => 'SUCC']);
                } else {
                    return json_encode(['status' => 'ERROR', 'message' => 'You do not permission to write file.']);
                }
                break;

        }

    }
}

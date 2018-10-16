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

class W00F0002Controller extends Controller
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
                //$environment = App::environment();
                $connection = config('database.connections.sqlsrv');
                \Debugbar::info($connection);
                $title = "Email Setting";
                return view('admin.W00F0002', compact('connection', 'title'));
                break;

        }

    }
}

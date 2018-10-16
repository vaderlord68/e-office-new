<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class W00F0001Controller extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $task = '')
    {
        \Debugbar::info($task);
        switch ($task) {
            case "":
                //$environment = App::environment();
                $connection = config('database.connections.sqlsrv');
                $title = "Database Setting";
                return view('admin.W00F0001', compact('connection', 'title'));
                break;
            case 'update':
                $txtServerName = $request->input('txtServerName');
                $txtUserName = $request->input('txtUserName');
                $txtPassword = $request->input('txtPassword');
                $txtDatabaseName = $request->input('txtDatabaseName');

                try {
                    Artisan::call('cache:clear');
                    $connectionInfo = array("Database" => "$txtDatabaseName", "UID" => "$txtUserName", "PWD" => "$txtPassword");
                    $conn = sqlsrv_connect($txtServerName, $connectionInfo);
                    \Debugbar::info($conn);
                    if ($conn) {
                        $env_update = \Helpers::changeEnv([
                            'DB_DATABASE' => $txtDatabaseName,
                            'DB_USERNAME' => $txtUserName,
                            'DB_HOST' => $txtServerName,
                            'DB_PASSWORD' => $txtPassword
                        ]);
                        if ($env_update) {
                            //Auth::user()->logout();
                            //Session::flush();
                            return json_encode(['status' => 'SUCC']);
                        } else {
                            return json_encode(['status' => 'ERROR', 'message' => 'You do not permission to write file.']);
                        }
                    } else {
                        return json_encode(['status' => 'ERROR', 'message' => 'Could not connect to the database.  Please check your configuration.', 'errorMsg' => $ex->getMessage()]);
                    }


                } catch (\Exception $ex) {
                    return json_encode(['status' => 'ERROR', 'message' => 'Could not connect to the database.  Please check your configuration.', 'errorMsg' => $ex->getMessage()]);
                }

                break;
        }

    }
}

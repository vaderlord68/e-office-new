<?php

namespace App\Http\Controllers\Module\Meeting;

use App\Http\Controllers\Controller;;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class  W76F2201Controller extends Controller
{

    public function index(Request $request, $task = "")
    {

        switch ($task) {
            case 'add':
                return view("system/module/Meeting/W76F2201/W76F2201", compact( 'task'));
                break;
            case 'edit':
                break;
            case 'save':
                break;

        }
    }
}

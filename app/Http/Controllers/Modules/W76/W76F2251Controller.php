<?php

namespace App\Http\Controllers\Modules\W76;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;


class  W76F2251Controller extends Controller
{
    protected $newsHelper;
    public function index($task = '')
    {
        $lang = \Helpers::getLang();
        $userID = Auth::user()->UserID;
        $title = 'Cập nhật văn bản đến';
        switch ($task) {
            case '':
            case 'add':
                 return View("modules.W76.W76f2251.W76f2251", compact( 'task', 'title'));
                break;

        }
    }
}

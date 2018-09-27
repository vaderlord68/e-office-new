<?php

namespace App\Http\Controllers\Modules\W76;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;


class  W76F2250Controller extends Controller
{
    protected $newsHelper;
    public function index($task = '')
    {
        $lang = \Helpers::getLang();
        $userID = Auth::user()->UserID;
        \Debugbar::info($lang);

        switch ($task) {
            case '':
                 return View("modules.W76.W76f2250.W76f2250", compact( 'task'));
                break;

        }
    }
}

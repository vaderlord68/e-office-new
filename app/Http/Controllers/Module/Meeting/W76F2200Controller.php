<?php

namespace App\Http\Controllers\Module\Meeting;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\News\D76T2140;
use App\Module\News\D76T2141;
use Illuminate\Http\Request;

class  W76F2200Controller extends Controller
{

    public function index($task = "")
    {
        switch ($task) {
            case '':
                return view("system/module/Meeting/W76F2200/W76F2200", compact('task'));
//                return View("system/module/Meeting/W76F2200/W76F2200",compact('task'));
                break;
        }
    }


}

<?php

namespace App\Http\Controllers\Module\W76\W76F1555;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;


class  W76F1555Controller extends Controller
{
    protected $newsHelper;

    public function index(Request $request, $task = '')
    {


        switch ($task){
            case '':
                return view("system/module/W76/W76F1555/W76F1555", compact('task'));
                break;
            case 'filter':
                break;
        }


    }

}

<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;


class  WXXController extends Controller
{
    public function download($filename = '')
    {
        $pathToFile = public_path()."\users-upload\\".$filename;
        return response()->download($pathToFile);

    }
}

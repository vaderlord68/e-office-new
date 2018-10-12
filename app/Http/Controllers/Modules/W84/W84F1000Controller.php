<?php

namespace App\Http\Controllers\Modules\W84;

use App\Http\Controllers\Controller;
use App\Models\D76T2140;
use App\Models\D76T2141;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class  W84F1000Controller extends Controller
{

    public function index($task = "")
    {
        $title = 'Cập nhật tiến độ';

//        switch ($task) {
//        }

        return view("modules/W84/W84F1000/W84F1000", compact('title'));
    }
}

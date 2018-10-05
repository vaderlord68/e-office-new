<?php

namespace App\Http\Controllers\Modules\W86;

use App\Http\Controllers\Controller;
use App\Models\D76T2140;
use App\Models\D76T2141;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class  W86F1000Controller extends Controller
{
    public function index(Request $request, $task = "")
    {

        return view("modules/W86/W86F1000/W86F1000", compact('task'));

    }

}

<?php

namespace App\Http\Controllers\Modules\W76;

use App\Http\Controllers\Controller;
use App\Models\D76T1556;
use App\Models\D76T2140;
use App\Models\D76T2141;
use App\Models\D76T2280;
use App\Models\D76T2281;
use App\Models\D76T2282;
use App\Models\D76T2300;
use App\Models\D76T2301;
use App\Models\D76T9020;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class  W76F3000Controller extends Controller
{

    public function index($task = "", Request $request)
    {
        $title = Helpers::getRS("Quan_tri_he_thong");

        return view("modules/W76/W76F3000/W76F3000", compact('title', 'task'));

    }


}

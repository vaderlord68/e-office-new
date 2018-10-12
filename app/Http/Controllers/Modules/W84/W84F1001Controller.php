<?php

namespace App\Http\Controllers\Modules\W84;

use App\Http\Controllers\Controller;
use App\Models\D76T2140;
use App\Models\D76T2141;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class  W84F1001Controller extends Controller
{
    public function index(Request $request, $component = '')
    {
        switch ($component) {
            case'':

                return view("modules/W86/W86F1000/components/layout", compact('organizationList'));
                break;
            case 'employeeList':

                return view("modules/W86/W86F1000/W86F1000", compact('orgunitID', 'employeeList'));
                break;
        }
    }
}

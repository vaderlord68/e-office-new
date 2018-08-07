<?php

namespace App\Http\Controllers\Module\Bi\Folder;

use App\CoreHelpers;
use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class  ViewController extends Controller
{

    public function index()
    {
        if (Helper::isAUserInSession()) {
            $viewHtml = view('system/module/bi/folderView')->render();
            return response()->json(array('success' => true, 'viewHtml' => $viewHtml));
        } else {
            return view('user/login');
        }
    }
}

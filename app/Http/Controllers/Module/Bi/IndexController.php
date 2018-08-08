<?php

namespace App\Http\Controllers\Module\Bi;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;


class  IndexController extends Controller
{
    public function index()
    {
        if (Helper::isAUserInSession()) {
//            return view('system/module/bi');
            return view('system/module/bi')->with("folderTree", $this->getFolderTree());
        } else {
            return view('user/login');
        }
    }

    public function getFolderTree()
    {
        $helper = new \App\Module\Bi\Helper();
        $tree = $helper->viewTree();
        return $tree;
    }
}

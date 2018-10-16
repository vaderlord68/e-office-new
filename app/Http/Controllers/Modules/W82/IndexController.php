<?php

namespace App\Http\Controllers\Modules\W82;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;


class  IndexController extends Controller
{
    const dashboardMenus = [
//        [
//            "title" => "Quản lý chuyên mục",
//            "url"   => "#",
//        ],
//        [
//            "title" => "Quản lý quyền truy cập",
//            "url"   => "#",
//        ],
//        [
//            "title" => "Quản lý tài liệu",
//            "url"   => "#",
//        ]
    ];
    public function __construct()
    {
        Helper::setSession("dashboardMenus",self::dashboardMenus);
    }

    public function index()
    {
        if (Helper::getSession("previousRequest")) {
            return view('modules/W82/bi')
                ->with("previousUrl",Helper::getSession("previousUrl"))
                ->with("folderTree", $this->getFolderTree());
        }
        if (Helper::isAUserInSession()) {
            return view('modules/W82/bi')->with("folderTree", $this->getFolderTree());
        } else {
            return view('user/login');
        }
    }

    public function getFolderTree()
    {
        $helper = new \App\Models\Helper();
        $tree = $helper->viewTree();
        return $tree;
    }
}

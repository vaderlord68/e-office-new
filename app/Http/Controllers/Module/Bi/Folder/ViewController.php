<?php

namespace App\Http\Controllers\Module\Bi\Folder;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\Bi\Folder;
use Illuminate\Http\Request;

class  ViewController extends Controller
{

    public function index(Request $request)
    {
        $helper = new \App\Module\Bi\Helper();
        $tree = $helper->viewTree();
        var_dump($tree);
        die;

        if (Helper::isAUserInSession()) {
            $dataPost = $request->input();
            $folderId = $dataPost["FolderID"];
            $allChildFolder = $this->getAllChildFolder($folderId);
            $viewHtml = view('system/module/bi/folderView')->render();
            return response()->json(array('success' => true, 'viewHtml' => $viewHtml, "allChildFolder" => $allChildFolder));
        } else {
            return view('user/login');
        }
    }

}

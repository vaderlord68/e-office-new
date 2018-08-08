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
        if (Helper::isAUserInSession()) {
            $dataPost = $request->input();
            $folderId = $dataPost["FolderID"];
            $viewHtml =
                view('system/module/bi/folderView')->with("requestFolderCollection")->render();
            return response()->json(array('success' => true, 'viewHtml' => $viewHtml));
        } else {
            return view('user/login');
        }
    }

}
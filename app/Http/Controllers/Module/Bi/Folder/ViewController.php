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
        $dataPost = $request->input();
        Helper::setSession("previousRequest",1);
        Helper::setSession("previousUrl","/bi/folder/view?FolderId=".$dataPost['FolderId']);
        if (isset($dataPost['secret'])) {
            if (Helper::isAUserInSession()) {
                $folderId = $dataPost["FolderId"];
                $childFolders = $this->getChildFolders($folderId);
                $viewHtml =
                    view('system/module/bi/folderView')->with("childFolders",$childFolders)->render();
                return response()->json(array('success' => true, 'viewHtml' => $viewHtml));
            } else {
                return view('user/login');
            }
        } else {
            return redirect('/bi');
        }

    }

    public function getChildFolders($folderId)
    {
        $folderFactory = new Folder();
        $childFolders = $folderFactory->getAllChildFolder($folderId);
        return $childFolders;
    }

}
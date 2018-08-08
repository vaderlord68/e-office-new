<?php

namespace App\Http\Controllers\Module\Bi\Folder;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\Bi\Folder;
use Illuminate\Http\Request;

class  CreateController extends Controller
{

    public function index(Request $request)
    {
        $dataPost = $request->input();
        Helper::setSession("previousRequest",1);
        Helper::setSession("previousUrl","/bi/folder/view?FolderId=".$dataPost['FolderParentID']);
        if (isset($dataPost['secret'])) {
            if (Helper::isAUserInSession()) {
                $viewHtml = view('system/module/bi/folderCreate')
                    ->with("CreateUserID", Helper::getSession("current_user"))
                    ->with("FolderParentID", $dataPost["FolderParentID"])
                    ->render();
                return response()->json(array('success' => true, 'viewHtml' => $viewHtml));
            } else {
                return view('user/login');
            }
        } else {
            return redirect('/bi');
        }
    }

    public function execute(Request $request)
    {
        try {
            $dataPost = $request->input();
            $folder = new Folder();
            $folder->setAttribute('FolderName', $dataPost['FolderName']);
            $folder->setAttribute('ID', str_replace(" ","-",strtolower($dataPost['FolderName'])));
            $folder->setAttribute('FolderParentID', $dataPost['FolderParentID']);
            $folder->setAttribute('CreateUserID', $dataPost['CreateUserID']);
            $folder->setAttribute('LastModifyUserID', $dataPost['CreateUserID']);
//            var_dump($folder);die;
            $folder->save();
            Helper::setSession('successMessage',"Tạo folder mới thành công");
            return redirect('/bi');
//            return response()->json(array('success' => true));
        } catch (\Exception $exception) {
//            var_dump($exception->getMessage());die;
            return redirect('/bi');
//            return response()->json(array('success' => false, 'errorMessage' => $exception->getMessage()));
        }
    }
}

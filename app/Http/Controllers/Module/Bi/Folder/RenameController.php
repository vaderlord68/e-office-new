<?php

namespace App\Http\Controllers\Module\Bi\Folder;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\Bi\Folder;
use Illuminate\Http\Request;

class  RenameController extends Controller
{

    public function index(Request $request)
    {
        $dataPost = $request->input();
        Helper::setSession("previousRequest",1);
        Helper::setSession("previousUrl","/bi/folder/view?FolderId=".$dataPost['SelectedFolderId']);
        if (isset($dataPost['secret'])) {
            if (Helper::isAUserInSession()) {

                $selectedFolderId = $dataPost["SelectedFolderId"];
                $currentFolder = Folder::find($selectedFolderId);
                $currentFolderName = $currentFolder->FolderName;

                $viewHtml = view('system/module/bi/folderRename')
                    ->with("oldFolderName", $currentFolderName)
                    ->with("currentFolderId", $selectedFolderId)
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
            $folderId = $dataPost['FolderID'];
            $newFolderName = $dataPost['NewFolderName'];
            $folderFactory = Folder::find($folderId);
            $folderFactory->FolderName = $newFolderName;
            $folderFactory->save();
            Helper::setSession('successMessage',"Đổi tên thư mục thành công");
            return redirect('/bi');
        } catch (\Exception $exception) {
            return redirect('/bi');
        }
    }
}

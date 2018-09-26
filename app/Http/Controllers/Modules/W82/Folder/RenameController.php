<?php

namespace App\Http\Controllers\Modules\W82\Folder;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\W82\IndexController;
use Illuminate\Http\Request;

class  RenameController extends Controller
{

    protected $biHelper;
    public function __construct()
    {
        $this->biHelper = new \App\Models\Helper();
        Helper::setSession("dashboardMenus",IndexController::dashboardMenus);
    }
    public function index(Request $request)
    {
        $dataPost = $request->input();
        $oldFolder = Folder::find($dataPost['SelectedFolderId']);
        return view("modules/W82/folderRename")
            ->with("oldFolderName",$oldFolder->FolderName)
            ->with("currentFolderId",$dataPost['SelectedFolderId'])
            ->with("folderTree", $this->biHelper->getFolderTree());
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

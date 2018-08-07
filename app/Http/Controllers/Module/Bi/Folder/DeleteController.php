<?php

namespace App\Http\Controllers\Module\Bi\Folder;

use App\Module\Bi\Folder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class  DeleteController extends Controller
{
    public function execute(Request $request)
    {
        try {
            $dataPost = $request->input();
            $folderId = $dataPost['FolderID'];
            $folderFactory = Folder::find($folderId);
            $folderFactory->delete();
            return response()->json(array('success' => true));
        } catch (\Exception $exception) {
            return response()->json(array('success' => false, 'errorMessage' => $exception->getMessage()));
        }
    }
}

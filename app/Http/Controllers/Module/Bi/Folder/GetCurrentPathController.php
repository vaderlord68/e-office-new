<?php

namespace App\Http\Controllers\Module\Bi\Folder;

use App\Module\Bi\Folder;
use App\Http\Controllers\Controller;
use App\Module\Bi\Helper;
use Illuminate\Http\Request;

class  GetCurrentPathController extends Controller
{
    public function execute(Request $request)
    {
        try {
            $helper = new Helper();
            $dataPost = $request->input();
            $folderId = $dataPost['FolderID'];
            $fullPath = $helper->getFullPath($folderId);
            return response()->json(array('success' => true, 'currentPath' => $fullPath));
        } catch (\Exception $exception) {
            return response()->json(array('success' => false, 'errorMessage' => $exception->getMessage()));
        }
    }
}

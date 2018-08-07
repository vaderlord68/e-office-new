<?php

namespace App\Http\Controllers\Module\Bi\Folder;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\Bi\Folder;
use Illuminate\Http\Request;

class  CreateController extends Controller
{

    public function index()
    {
        if (Helper::isAUserInSession()) {
            $viewHtml = view('system/module/bi/folderCreate')->render();
            return response()->json(array('success' => true, 'viewHtml' => $viewHtml));
        } else {
            return view('user/login');
        }
    }

    public function execute(Request $request)
    {
        try {
            $dataPost = $request->input();
            $folder = new Folder();
            $folder->setAttribute('FolderName', $dataPost['FolderName']);
            $folder->setAttribute('ID', strtolower($dataPost['FolderName']));
            $folder->setAttribute('FolderParentID', $dataPost['FolderParentID']);
            $folder->setAttribute('OrderNo', $dataPost['OrderNo']);
            $folder->setAttribute('CreateUserID', $dataPost['current_user_id']);
            $folder->setAttribute('LastModifyUserID', $dataPost['current_user_id']);
            $folder->save();
            return response()->json(array('success' => true));
        } catch (\Exception $exception) {
            return response()->json(array('success' => false, 'errorMessage' => $exception->getMessage()));
        }
    }
}

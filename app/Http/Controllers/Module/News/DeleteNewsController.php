<?php

namespace App\Http\Controllers\Module\News;

use App\Eoffice\Helper;
use App\Module\Bi\Document;
use App\Module\Bi\Folder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class  DeleteNewsController extends Controller
{
    var $folderToDelete = [];
    public function execute(Request $request)
    {
        try {
            $dataPost = $request->input();
            $news = $dataPost['hdNewsID'];
            $this->folderToDelete[] = $news;
            $this->findAllChild($news);
            $this->deleteNews();
            Helper::setSession('successMessage',"Xóa thư mục thành công");
            return response()->json(array('success' => true));
        } catch (\Exception $exception) {
            return response()->json(array('success' => false, 'errorMessage' => $exception->getMessage()));
        }
    }
}

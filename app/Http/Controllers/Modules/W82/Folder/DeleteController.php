<?php

namespace App\Http\Controllers\Modules\W82\Folder;

use App\Eoffice\Helper;
use App\Models\Document;
use App\Http\Controllers\Controller;
use App\Models\Folder;
use Illuminate\Http\Request;

class  DeleteController extends Controller
{
    var $folderToDelete = [];
    public function execute(Request $request)
    {
        try {
            $dataPost = $request->input();
            $folderId = $dataPost['SelectedFolderId'];
            $this->folderToDelete[] = $folderId;
            $this->findAllChild($folderId);
            $this->deleteCascadeFolder();
            Helper::setSession('successMessage',"Xóa thư mục thành công");
            return response()->json(array('success' => true));
        } catch (\Exception $exception) {
            return response()->json(array('success' => false, 'errorMessage' => $exception->getMessage()));
        }
    }

    public function findAllChild($folderId)
    {
        $folderFactory = new Folder();
        $folderCollection = $folderFactory->getAllChildFolder($folderId);
        if (count($folderCollection) > 0) {
            foreach ($folderCollection as $folder) {
                $this->folderToDelete[] = $folder->ID;
                $this->findAllChild($folder->ID);
            }
        }
        return true;
    }

    public function deleteCascadeFolder()
    {
        foreach ($this->folderToDelete as $folderId) {
            /** delete related documents first */
            $documentFactory = new Document();
            $relatedDocument = $documentFactory->getDocumentsWithFolderId($folderId);
            foreach ($relatedDocument as $document) {
                $thisDocument = Document::find($document->ID);
                $thisDocument->delete();
            }

            $folder = Folder::find($folderId);
            $folder->delete();
        }
    }
}

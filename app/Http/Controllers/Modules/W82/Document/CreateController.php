<?php

namespace App\Http\Controllers\Modules\W82\Document;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\W82\IndexController;
use App\Models\Document;
use App\Models\RelatedDocument;
use Illuminate\Http\Request;

class  CreateController extends Controller
{

    protected $biHelper;
    public function __construct()
    {
        $this->biHelper = new \App\Models\Helper();
        Helper::setSession("dashboardMenus", IndexController::dashboardMenus);
    }
    public function index(Request $request)
    {
        $dataPost = $request->input();
        return view("modules/W82/documentCreate")
            ->with("CreateUserID",Helper::getSession("current_user"))
            ->with("AllDocuments",$this->getAllDocument())
            ->with("FolderParentID",$dataPost['FolderParentID'])
            ->with("folderTree", $this->biHelper->getFolderTree());
    }

    public function execute(Request $request)
    {
        try {
            $dataPost = $request->input();
            $uploadedFiles = $request->file('AttachedFiles');
            $fileOrderNumber = 1;
            $filePaths = [];
            if ($uploadedFiles || is_array($uploadedFiles)) {
                foreach ($uploadedFiles as $uploadedFile) {
                    $filePaths[] = $this->biHelper->uploadFile($uploadedFile,$fileOrderNumber);
                    $fileOrderNumber++;
                }
            }


            $DocumentName = $dataPost['DocumentName'];
            $DocumentContent = $dataPost['DocumentContent'];
            $StatusID = isset($dataPost['StatusID']) ? $dataPost['StatusID'] : false;
            $CreateUserID = $dataPost['CreateUserID'];
            $FolderID = $dataPost['FolderID'];
            $DocumentID = $CreateUserID."-".time();

            $document = new Document();
            $document->setAttribute("ID",$DocumentID);
            $document->setAttribute("Name",$DocumentName);
            $document->setAttribute("Content",$DocumentContent);
            $document->setAttribute("StatusID",$StatusID ? true : false);
            $document->setAttribute("CreateUserID",$CreateUserID);
            $document->setAttribute("FolderID",$FolderID);
            $document->setAttribute("ReadQuan",0);
            $document->setAttribute("LikeQuan",0);
            $document->setAttribute("LastModifyUserID",$CreateUserID);
            $document->setAttribute("AttachedFiles",json_encode($filePaths));
            $document->save();

            if (isset($dataPost['relatedDocumentIds'])) {
                $relatedDocumentIds = $dataPost['relatedDocumentIds'];
                foreach ($relatedDocumentIds as $refDocID) {
                    $connection = new RelatedDocument();
                    $connection->setAttribute('DocID',$DocumentID);
                    $connection->setAttribute('RefDocID',$refDocID);
                    $connection->setAttribute('CreateUserID',$CreateUserID);
                    $connection->save();
                }
            }


            Helper::setSession('successMessage',"Tạo tài liệu mới thành công");
        } catch (\Exception $exception) {
            Helper::setSession('errorMessage',$exception->getMessage());
        }
        return redirect("/bi");
    }

    public function getAllDocumentExceptThis($documentId)
    {
        $documentFactory = new Document();
        $collection = $documentFactory->getAllDocumentExceptThis($documentId);
        return $collection;
    }

    public function getAllDocument()
    {
        $documentFactory = new Document();
        $collection = $documentFactory->getCollection();
        return $collection;
    }
}

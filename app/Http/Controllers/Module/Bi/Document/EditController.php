<?php

namespace App\Http\Controllers\Module\Bi\Document;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\Bi\Document;
use App\Module\Bi\Folder;
use App\Module\Bi\RelatedDocument;
use Illuminate\Http\Request;

class  EditController extends Controller
{
    protected $biHelper;
    public function __construct()
    {
        $this->biHelper = new \App\Module\Bi\Helper();
        Helper::setSession("dashboardMenus",\App\Http\Controllers\Module\Bi\IndexController::dashboardMenus);
    }

    public function index(Request $request)
    {
        $dataPost = $request->input();
        $documentID = $dataPost['documentID'];
        $document = Document::find($documentID);

        $idArray = $this->getDocumentIdArray($this->getRelatedDocWithDocId($documentID));
        $relatedDocumentsCollection = $this->getDocumentCollectionForIDs($idArray);

        return view("system/module/bi/documentEdit")
            ->with("currentDocumentID", $documentID)
            ->with("AllDocuments",$this->getAllDocumentExceptThis($documentID))
            ->with("AllRelatedDocuments",$this->getRelatedDocument($documentID))
            ->with("relatedDocuments",$relatedDocumentsCollection)
            ->with("currentDocument", $document)
            ->with("folderTree", $this->biHelper->getFolderTree());

    }

    public function execute(Request $request)
    {
        $dataPost = $request->input();
        $DocumentID = $dataPost['ID'];
        try {

            $uploadedFiles = $request->file('AttachedFiles');
            $fileOrderNumber = 1;
            $filePaths = [];
            if ($uploadedFiles && is_array($uploadedFiles) && count($uploadedFiles)) {
                foreach ($uploadedFiles as $uploadedFile) {
                    $filePaths[] = $this->biHelper->uploadFile($uploadedFile,$fileOrderNumber);
                    $fileOrderNumber++;
                }
            }
            $DocumentName = $dataPost['DocumentName'];
            $DocumentContent = $dataPost['DocumentContent'];
            $StatusID = isset($dataPost['StatusID']) ? $dataPost['StatusID'] : false;

            $document = Document::find($DocumentID);
            $document->setAttribute("Name",$DocumentName);
            $document->setAttribute("Content",$DocumentContent);
            $document->setAttribute("StatusID",$StatusID ? true : false);
            $document->setAttribute("LastModifyUserID",session('current_user'));
            $document->setAttribute("LastModifyDate", date("Y-m-d h:m:s"));
            /** Add more file */
            $attachedFiles = json_decode($document->AttachedFiles);
            foreach ($filePaths as $path) {
                $attachedFiles[] = $path;
            }
            $document->setAttribute("AttachedFiles",json_encode($attachedFiles));
            $document->save();

            /** Remove all old relation */
            $relatedDocumentFactory = new RelatedDocument();
            $relatedDocumentFactory->deleteRelationByDocumentID($DocumentID);

            /** Insert new relation */
            if (isset($dataPost['relatedDocumentIds'])) {
                $relatedDocumentIds = $dataPost['relatedDocumentIds'];
                foreach ($relatedDocumentIds as $refDocID) {
                    $connection = new RelatedDocument();
                    $connection->setAttribute('DocID',$DocumentID);
                    $connection->setAttribute('RefDocID',$refDocID);
                    $connection->setAttribute('CreateUserID',session('current_user'));
                    $connection->save();
                }
            }


            Helper::setSession('successMessage',"Lưu tài liệu thành công");
        } catch (\Exception $exception) {
            Helper::setSession('errorMessage',$exception->getMessage());
        }
        return redirect("/bi/document/edit?documentID=$DocumentID");
    }

    public function getRelatedDocWithDocId($DocID)
    {
        $relatedDocumentFactory = new RelatedDocument();
        $collection = $relatedDocumentFactory->getRelatedDocWithDocId($DocID);
        return $collection;
    }

    public function getDocumentCollectionForIDs($ids)
    {
        $documentFactory = new Document();
        $collection = $documentFactory->getDocumentsWhereIdIn($ids);
        return $collection;
    }

    public function getDocumentIdArray($collection)
    {
        $array = [];
        foreach ($collection as $item) {
            $array[] = $item->RefDocID;
        }
        return $array;
    }

    public function getAllDocumentExceptThis($documentID)
    {
        $documentFactory = new Document();
        $collection = $documentFactory->getAllDocumentExceptThis($documentID);
        return $collection;
    }

    public function getRelatedDocument($documentID)
    {
        $relatedDocumentFactory = new RelatedDocument();
        $collection = $relatedDocumentFactory->getRelatedDocWithDocId($documentID);
        return $collection;
    }


}
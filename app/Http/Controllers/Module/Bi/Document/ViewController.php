<?php

namespace App\Http\Controllers\Module\Bi\Document;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\Bi\Document;
use App\Module\Bi\Folder;
use App\Module\Bi\RelatedDocument;
use Illuminate\Http\Request;

class  ViewController extends Controller
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
        $requestDocumentId = $dataPost['DocumentId'];

        $requestDocument = Document::find($requestDocumentId);
        $idArray = $this->getDocumentIdArray($this->getRelatedDocWithDocId($requestDocumentId));
        $relatedDocumentsCollection = $this->getDocumentCollectionForIDs($idArray);
        return view("system/module/bi/documentView")
            ->with("folderTree", $this->biHelper->getFolderTree())
            ->with("document",$requestDocument)
            ->with("relatedDocuments",$relatedDocumentsCollection)
            ->with("documentID",$requestDocumentId);

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


}
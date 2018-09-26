<?php

namespace App\Http\Controllers\Modules\W82\Document;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\W82\IndexController;
use App\Models\Document;
use App\Models\RelatedDocument;
use Illuminate\Http\Request;

class  ViewController extends Controller
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
        $requestDocumentId = $dataPost['DocumentId'];

        $requestDocument = Document::find($requestDocumentId);
        $idArray = $this->getDocumentIdArray($this->getRelatedDocWithDocId($requestDocumentId));
        $relatedDocumentsCollection = $this->getDocumentCollectionForIDs($idArray);
        return view("modules/W82/documentView")
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
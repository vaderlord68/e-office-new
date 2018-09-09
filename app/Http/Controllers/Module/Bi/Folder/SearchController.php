<?php

namespace App\Http\Controllers\Module\Bi\Folder;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\Bi\Document;
use App\Module\Bi\Folder;
use Illuminate\Http\Request;

class  SearchController extends Controller
{
    protected $biHelper;
    public function __construct()
    {
        $this->biHelper = new \App\Module\Bi\Helper();
        Helper::setSession("dashboardMenus",\App\Http\Controllers\Module\Bi\IndexController::dashboardMenus);
    }

    public function execute(Request $request)
    {
        $dataPost = $request->input();
        $keyword = $dataPost['keyword'];
        $foundFolders = $this->getFoldersByName($keyword);
        $foundDocuments = $this->getDocumentsByName($keyword);
        $resultCount = $this->countSearchResult($foundFolders,$foundDocuments);
        return view("system/module/bi/folderSearch")
            ->with("folderTree", $this->biHelper->getFolderTree())
            ->with("keyword", $keyword)
            ->with("resultCount", $resultCount)
            ->with("foundFolders",$foundFolders)
            ->with("foundDocuments",$foundDocuments);

    }

    public function getFoldersByName($keyword)
    {
        $folderFactory = new Folder();
        $collection = $folderFactory->getSearchResultByKeyword($keyword);
        return $collection;
    }
    public function getDocumentsByName($keyword)
    {
        $documentFactory = new Document();
        $collection = $documentFactory->getSearchResultByKeyword($keyword);
        return $collection;

    }

    function countSearchResult($foundFolders,$foundDocuments)
    {
        $count = count($foundFolders) + count($foundDocuments);
        return $count;
    }

}
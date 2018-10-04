<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;

class Helper extends \Illuminate\Database\Eloquent\Model
{
    protected $fullPath = [];
    var $folders = array();

    public function getFolderCollection()
    {
        $this->folders = array();
        $folderFactory = new Folder();
        $folderCollection = $folderFactory->getCollection();
        return $folderCollection;
    }

    public function folderCollectionToArray($folderCollection)
    {
        foreach ($folderCollection as $key => $value) {
            $this->folders[$key] = $value;
        }
    }

    public function viewTree()
    {
        $folderCollection = $this->getFolderCollection();
        $this->folderCollectionToArray($folderCollection);

        $output = "<ul>";
        for ($i = 0; $i < count($this->folders); $i++) {
            /** For level 0 parent folders */
            if ($this->folders[$i]->FolderParentID == "")
            {
                $output .= "<li folder_id=\"" .$this->folders[$i]->ID ."\">".$this->folders[$i]->FolderName."<ul>";
                $output .= $this->getAllChildren($this->folders[$i]->ID);
                $documentsCollection = $this->getAllChildDocument($this->folders[$i]->ID);
                foreach ($documentsCollection as $document) {
                    $output .= "<li class='node-type-document' type='document' document_id='$document->ID'>". $document->Name ."</li>";
                }
                $output .= "</ul></li>";

            }
        }
        $output .= "</ul>";
        return $output;
    }

    public function getAllChildren($folderParentId)
    {
        //Get all the nodes for particular ID
        $output = "";
        for ($i = 0; $i < count($this->folders); $i++) {
            /** For others level 1+ folder */
            if ($this->folders[$i]->FolderParentID == $folderParentId)
            {
                $output .= "<li class='tree-node-folder' folder_id=\"" .$this->folders[$i]->ID ."\">".$this->folders[$i]->FolderName."<ul>";
                $output .= $this->getAllChildren($this->folders[$i]->ID);
                $documentsCollection = $this->getAllChildDocument($this->folders[$i]->ID);
                foreach ($documentsCollection as $document) {
                    $output .= "<li class='node-type-document' type='document' data-jstree='{\"icon\": \"fa fa-file text-primary\"}' document_id='$document->ID'>". $document->Name ."</li>";
                }
                $output .= "</ul></li>";

            }
        }
        return $output;
    }

    public function getAllChildDocument($folderID)
    {
        $UserID = Auth::id();
//        $documentFactory = new Document();
//        $collection = $documentFactory->getDocumentsWithFolderId($folderID);
        $collection = \DB::select("EXEC W76P2000 '$UserID', '$folderID'");

        return $collection;
    }

    public function getFullPath($folderId)
    {

        $folder = Folder::find($folderId);
        $this->fullPath[] = ['name' => $folder->FolderName , 'id' => $folderId];
        if ($folder->FolderParentID != "") {
            $this->getNextParent($folder->FolderParentID);
        }
        return array_reverse($this->fullPath);
    }

    public function getNextParent($folderId)
    {
        $folder = Folder::find($folderId);
        $this->fullPath[] = ['name' => $folder->FolderName , 'id' => $folderId];
        if ($folder->FolderParentID != "") {
            $this->getNextParent($folder->FolderParentID);
        }
    }

    public function processFullPath($fullPath)
    {
        $htmlOutput = "";
        foreach ($fullPath as $path) {
            $folderId = $path['id'];
            $folderName = $path['name'];
            $htmlOutput .= "<a href='/bi/folder/view?FolderId=$folderId'>".$folderName."</a>";
        }
        return $htmlOutput;
    }
    public function getFolderTree()
    {
        $tree = self::viewTree();
        return $tree;
    }

    public function uploadFile($file,$fileOrderNumber)
    {
        /**
         * Upload user image and get the path then save it into database
         */
        $userId = session("current_user");
        $fileName = \Helpers::suffixName($file->getClientOriginalName()) ;


        if (!file_exists(public_path() . "\users-upload\\")) {
            mkdir(public_path() . "\users-upload\\");
        }

        $filePath = public_path() . "\users-upload\\";

        try{
            $file->move($filePath, $fileName);

        }catch (\Exception $ex){
            \Debugbar::info($ex->getMessage());
        }
        return $fileName;
    }

}
<?php

namespace App\Http\Controllers\Module\W76;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\W76\D76T1010;
use App\Module\W76\D76T1020;
use App\Module\W76\D76T1556;
use App\Module\W76\D76T2000;
use App\Module\W76\D76T2080;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class  W76F2150Controller extends Controller
{

    private $d76T1556;
    private $d76T1010;
    private $d76T2000;
    private $d76T1020;
    private $d76T2080;
    private $newsHelper;

    public function __construct(D76T1010 $d76T1010, D76T2000 $d76T2000, D76T1020 $d76T1020, D76T2080 $d76T2080, D76T1556 $d76T1556)
    {
        $this->d76T1556 = $d76T1556;
        $this->d76T1010 = $d76T1010;
        $this->d76T2000 = $d76T2000;
        $this->d76T1020 = $d76T1020;
        $this->d76T2080 = $d76T2080;
        $this->newsHelper = new \App\Module\News\Helper();
    }

    public function index(Request $request, $type = '')
    {
        //Tao folder root, neu chua co
        $this->createFolderRoot();
        $currentFolderID = $request->input('currentFolderID', '');
        $treeViewData = $this->getTreeView($currentFolderID);
        switch ($type) {
            case '':
                $documentList = $this->d76T1020->where('FolderParentID','=',$currentFolderID)->get();
                return view("system/module/W76/W76F2150/W76F2150", compact('treeViewData','currentFolderID','documentList'));
                break;
            case 'create-folder':
                return view("system/module/W76/W76F2150/W76F2150_CreateFolderModal", compact('treeViewData','currentFolderID'));
                break;
            case 'save-folder':
                $txtFolderName = $request->input('txtFolderName', '');
                $txtFolderDescription = $request->input('txtFolderDescription', '');
                $txtFolderID = $request->input('hdFolderID', '');
                $folderParentID = $request->input('hdParentFolderID', '');
                \Debugbar::info($request->input);
                if ($txtFolderID == ''){

                    if ($this->d76T1020->where('FolderName', '=',$txtFolderName)->where('FolderParentID', '=',$folderParentID)->first() != null){
                        return json_encode(['status'=>'ERROR', 'message'=>'Thư mục đã bị trùng tên trong hệ thống']);
                    }

                    $rowData = [
                        "ID" => DB::raw('NEWID()'),
                        "FolderName"=>$txtFolderName,
                        "FolderParentID"=>$folderParentID,
                        "CreateUserID"=>Auth::user()->UserID,
                        "CreateDate"=> Carbon::now(),
                        "LastModifyUserID"=>Auth::user()->UserID,
                        "LastModifyDate"=> Carbon::now()
                    ];

                    try{
                        $this->d76T1020->insert($rowData);
                        Helper::setSession('successMessage','Thư mục đã được tạo thành công');
                        return json_encode(['status'=>'OKAY', 'message'=>'']);
                    }catch (\Exception $ex){
                        return json_encode(['status'=>'ERROR', 'message'=>$ex->getMessage()]);
                    }
                }else{
                    $rowData = [
                        "FolderName"=>$txtFolderName,
                        "FolderParentID"=>$folderParentID,
                        "CreateUserID"=>Auth::user()->UserID,
                        "CreateDate"=> Carbon::now(),
                        "LastModifyUserID"=>Auth::user()->UserID,
                        "LastModifyDate"=> Carbon::now()
                    ];

                    try{
                        $this->d76T1020->update($rowData);
                        Helper::setSession('successMessage','Thư mục đã cập nhật thành công');
                        return json_encode(['status'=>'OKAY', 'message'=>'']);
                    }catch (\Exception $ex){
                        return json_encode(['status'=>'ERROR', 'message'=>$ex->getMessage()]);
                    }
                }
            case 'delete-folder':
                $idList = $request->input('idList', []);
                \Debugbar::info($idList);
                break;
            case 'create-document':
                $docTypeList = $this->d76T1556->where('ListTypeID', '=','D76T2010_DocType')->get();
                $docFieldList = $this->d76T1556->where('ListTypeID', '=','D76T2010_DocField')->get();
                $docOrgList = $this->d76T1556->where('ListTypeID', '=','D76T2010_DocField')->get();
                //return "dfs";
                return view("system/module/W76/W76F2150/W76F2150_CreateDocumentModal", compact('docOrgList','docFieldList','docTypeList','treeViewData','currentFolderID'));
        }
    }

    private function getTreeView($folderId){
        $json = [];
//        $d76T1010List = $this->d76T1010->get()->toArray();
//        $currentNode = $this->d76T1010->where('FolderParentID', '=', '')->first();
//        $json = $this->createTreeViewData($currentNode, $d76T1010List, $json, $folderId);

        $d76T1020List = $this->d76T1020->get()->toArray();
        $currentNode = $this->d76T1020->where('FolderParentID', '=','')->first();
        $json = $this->createTreeViewData($currentNode, $d76T1020List, $json, $folderId);
        \Debugbar::info($json);
        $json = json_encode($json);
        return $json;
    }

    private function createTreeViewData($currentNode, $arrayIn, &$arrayOut, $folderId)
    {
        if ($currentNode != null) {
            $node = new Node();
            $node->id = $currentNode["ID"];
            $node->text = $currentNode["FolderName"];
            $node->parent = $currentNode["FolderParentID"] == "" ? "#" : $currentNode["FolderParentID"];
            //if ($currentNode["FolderParentID"] == ""){
                $state = new State();
                $state->opened = ($node->id == $folderId ? true : false) ;
                $state->selected = ($node->id == $folderId ? true : false) ;
                $state->disabled = false;
                $node->state = $state;
            //}
            array_push($arrayOut,$node);
            $arrTemp = array_filter($arrayIn, function ($row) use ($currentNode) {
                return $row["FolderParentID"] == $currentNode["ID"];
            });
            foreach ($arrTemp as $row){
                $this->createTreeViewData($row,$arrayIn,$arrayOut, $folderId);
            }

        }

        return $arrayOut;
    }

    private function createFolderRoot()
    {
        //Kiem tra neu 4 cai menu root chua co thi tao
        if ($this->d76T1010->where('FolderParentID', '=', '')->first() == null) {
            $rowData = [
                "ID" => DB::raw('NEWID()'),
                "FolderName" => 'Tài liệu chia sẽ',
                "FolderParentID" => '',
                "OrderNo" => 0,
                "CreateUserID" => Auth::user()->UserID,
                "CreateDate" => Carbon::now(),
                "LastModifyUserID" => Auth::user()->UserID,
                "LastModifyDate" => Carbon::now(),
                "FolderDescription" => 'Tài liệu chia sẽ',
            ];
            $this->d76T1010->insert($rowData);


            $rowData = [
                "ID" => DB::raw('NEWID()'),
                "FolderName" => 'PHP',
                "FolderParentID" => $this->d76T1010->first()->ID,
                "OrderNo" => 0,
                "CreateUserID" => Auth::user()->UserID,
                "CreateDate" => Carbon::now(),
                "LastModifyUserID" => Auth::user()->UserID,
                "LastModifyDate" => Carbon::now(),
                "FolderDescription" => 'Tài liệu chia sẽ',
            ];
            $this->d76T1010->insert($rowData);

            $rowData = [
                "ID" => DB::raw('NEWID()'),
                "FolderName" => 'LARAVEL',
                "FolderParentID" => $this->d76T1010->first()->ID,
                "OrderNo" => 0,
                "CreateUserID" => Auth::user()->UserID,
                "CreateDate" => Carbon::now(),
                "LastModifyUserID" => Auth::user()->UserID,
                "LastModifyDate" => Carbon::now(),
                "FolderDescription" => 'Tài liệu chia sẽ',
            ];
            $this->d76T1010->insert($rowData);

        }


        if ($this->d76T1020->where('FolderParentID', '=', '')->first() == null) {
            $rowData = [
                "ID" => DB::raw('NEWID()'),
                "FolderName" => 'Văn bản pháp luật',
                "FolderParentID" => '',
                //"OrderNo" => 0,
                "CreateUserID" => Auth::user()->UserID,
                "CreateDate" => Carbon::now(),
                "LastModifyUserID" => Auth::user()->UserID,
                "LastModifyDate" => Carbon::now(),
                //"FolderDescription" => 'Tài liệu chia sẽ',
            ];
            $this->d76T1020->insert($rowData);

        }
    }

}

class Node
{
    public $id = '';
    public $parent = '';
    public $text = '';
    public $icon = '';
    public $state = null;
    public $li_attr = '';
    public $a_attr = '';
}

class State{
    public $opened;
    public $disabled;
    public $selected;
}



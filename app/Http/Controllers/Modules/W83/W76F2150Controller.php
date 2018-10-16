<?php

namespace App\Http\Controllers\Modules\W83;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Models\D76T1010;
use App\Models\D76T1556;
use App\Models\D76T2000;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class  W76F2150Controller extends Controller
{

    private $d76T1556;
    private $d76T1010;
    private $d76T2000;
    private $newsHelper;

    public function __construct(D76T1010 $d76T1010, D76T2000 $d76T2000, D76T1556 $d76T1556)
    {
        $this->d76T1556 = $d76T1556;
        $this->d76T1010 = $d76T1010;
        $this->d76T2000 = $d76T2000;
        $this->newsHelper = new \App\Module\News\Helper();
    }

    public function index(Request $request, $type = '')
    {
        //Tao folder root, neu chua co
        $this->createFolderRoot();
        $currentFolderID = $request->input('currentFolderID', '');
        $treeViewData = $this->getTreeView($currentFolderID);
        $title = 'Quản lý tài liệu chia sẽ';
        switch ($type) {
            case '':
                $folderList = $this->d76T1010->where('FolderParentID', '=', $currentFolderID)->select("ID", DB::raw("FolderName as Description"),DB::raw("'Folder' as Type"), "CreateUserID", "CreateDate", "LastModifyUserID", "LastModifyDate");
                $fileList = $this->d76T2000->where('FolderID', '=', $currentFolderID)->select("ID", DB::raw("DocName as Description"),DB::raw("'File' as Type"), "CreateUserID", "CreateDate", "LastModifyUserID", "LastModifyDate");

                $documentList = $folderList->union($fileList)->get();

                return view("modules/W83/W76F2150/W76F2150", compact('title', 'treeViewData', 'currentFolderID', 'documentList'));
                break;
            case 'create-folder':
                return view("modules/W83/W76F2150/W76F2150_CreateFolderModal", compact('treeViewData', 'currentFolderID', 'type'));
                break;
            case 'edit-folder':
                try {
                    $rsData = $this->d76T1010->where('ID', '=', $currentFolderID)->first();
                    return view("modules/W83/W76F2150/W76F2150_CreateFolderModal", compact('treeViewData', 'currentFolderID', 'rsData', 'type'));
                } catch (\Exception $ex) {
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }

                break;
            case 'save-folder':
            case 'update-folder':
                $txtFolderName = $request->input('txtFolderName', '');
                $txtFolderDescription = $request->input('txtFolderDescription', '');
                $ID = $request->input('ID', '');

                if ($ID == '') {
                    $currentFolderID = $request->input('currentFolderID', '');
                    if ($this->d76T1010->where('FolderName', '=', $txtFolderName)->where('FolderParentID', '=', $currentFolderID)->first() != null) {
                        return json_encode(['status' => 'ERROR', 'message' => 'Thư mục đã bị trùng tên trong hệ thống']);
                    }

                    $rowData = [
                        "ID" => DB::raw('NEWID()'),
                        "FolderName" => $txtFolderName,
                        "FolderDescription" => $txtFolderDescription,
                        "FolderParentID" => $currentFolderID,
                        "CreateUserID" => Auth::user()->UserID,
                        "CreateDate" => Carbon::now(),
                        "LastModifyUserID" => Auth::user()->UserID,
                        "LastModifyDate" => Carbon::now()
                    ];

                    try {
                        $this->d76T1010->insert($rowData);
                        Helper::setSession('successMessage', 'Thư mục đã được tạo thành công');
                        return json_encode(['status' => 'OKAY', 'message' => '']);
                    } catch (\Exception $ex) {
                        return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                    }
                } else {
                    $rowData = [
                        "FolderName" => $txtFolderName,
                        "FolderDescription" => $txtFolderDescription,
                        "LastModifyUserID" => Auth::user()->UserID,
                        "LastModifyDate" => Carbon::now()
                    ];

                    try {
                        $this->d76T1010->where('ID', '=', $ID)->update($rowData);
                        Helper::setSession('successMessage', 'Thư mục đã cập nhật thành công');
                        return json_encode(['status' => 'OKAY', 'message' => '']);
                    } catch (\Exception $ex) {
                        return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                    }
                }
            case 'delete-folder':
                try {
                    $this->d76T1010->where('ID', '=', $currentFolderID)->delete();
                } catch (\Exception $ex) {

                }
                break;
            case 'create-document':
                $docTypeList = $this->d76T1556->where('ListTypeID', '=', 'D76T2010_DocType')->get();
                $docFieldList = $this->d76T1556->where('ListTypeID', '=', 'D76T2010_DocField')->get();
                $docOrgList = $this->d76T1556->where('ListTypeID', '=', 'D76T2010_DocField')->get();
                //return "dfs";
                return view("modules/W83/W76F2150/W76F2150_CreateDocumentModal", compact('docOrgList', 'docFieldList', 'docTypeList', 'treeViewData', 'currentFolderID'));
        }
    }

    private function getTreeView($folderId)
    {
        $json = [];

        $d76T1010List = $this->d76T1010->get()->toArray();
        $currentNode = $this->d76T1010->where('FolderParentID', '=', '')->first();
        $json = $this->createTreeViewData($currentNode, $d76T1010List, $json, $folderId);
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
            $state->opened = ($node->id == $folderId ? true : false);
            $state->selected = ($node->id == $folderId ? true : false);
            $state->disabled = false;
            $node->state = $state;
            //}
            array_push($arrayOut, $node);
            $arrTemp = array_filter($arrayIn, function ($row) use ($currentNode) {
                return $row["FolderParentID"] == $currentNode["ID"];
            });
            foreach ($arrTemp as $row) {
                $this->createTreeViewData($row, $arrayIn, $arrayOut, $folderId);
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


        if ($this->d76T1010->where('FolderParentID', '=', '')->first() == null) {
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
            $this->d76T1010->insert($rowData);

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

class State
{
    public $opened;
    public $disabled;
    public $selected;
}



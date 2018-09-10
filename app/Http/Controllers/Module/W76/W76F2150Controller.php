<?php

namespace App\Http\Controllers\Module\W76;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Module\W76\D76T1010;
use App\Module\W76\D76T1020;
use App\Module\W76\D76T2000;
use App\Module\W76\D76T2080;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class  W76F2150Controller extends Controller
{

    private $d76T1010;
    private $d76T2000;
    private $d76T1020;
    private $d76T2080;
    private $newsHelper;

    public function __construct(D76T1010 $d76T1010, D76T2000 $d76T2000, D76T1020 $d76T1020, D76T2080 $d76T2080)
    {
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

        switch ($type) {
            case '':
                $json = [];
                $d76T1010List = $this->d76T1010->get()->toArray();
                $currentNode = $this->d76T1010->where('FolderParentID', '=', '')->first();
                $json = $this->createTreeViewData($currentNode, $d76T1010List, $json);

                $d76T1020List = $this->d76T1020->get()->toArray();
                $currentNode = $this->d76T1020->where('FolderParentID', '=','')->first();
                $json = $this->createTreeViewData($currentNode, $d76T1010List, $json);

                $json = json_encode($json);

                //$json = '[{"id":"FBB30931-9C84-4BA7-8A54-64B7D27C21ED","text":"T\u00e0i li\u1ec7u chia s\u1ebd","parent":"#","chidren":[{"id":"F134A7A3-EB89-4894-8001-5E713974ACCC","text":"PHP","parent":"FBB30931-9C84-4BA7-8A54-64B7D27C21ED","chidren":[]},{"id":"C1900F7B-97BD-439C-9278-A8F3490BEEE0","text":"LARAVEL","parent":"FBB30931-9C84-4BA7-8A54-64B7D27C21ED","chidren":[]}]}]';
                return view("system/module/W76/W76F2150/W76F2150", compact('json'));
                break;

        }
    }

//    private function createTreeViewData($currentNode, $arrayIn, &$arrayOut)
//    {
//        //\Debugbar::info($currentNode);
//        if ($currentNode != null) {
//            //$node = new Node();
//            //$node["id"] = $currentNode["ID"];
//            $node["text"] = $currentNode["FolderName"];
//            //$node["parent"] = $currentNode["FolderParentID"] == "" ? "#" : $currentNode["FolderParentID"];
//            $node["chidren"] = [];
//            $arrTemp = array_filter($arrayIn, function ($row) use ($currentNode) {
//                return $row["FolderParentID"] == $currentNode["ID"];
//            });
//            foreach ($arrTemp as $row){
//                $this->createTreeViewData($row,$arrayIn,$node["chidren"]);
//            }
//
//        }
//        array_push($arrayOut,$node);
//        return $arrayOut;
//    }

    private function createTreeViewData($currentNode, $arrayIn, &$arrayOut)
    {
//        public $id = '';
//        public $parent = '';
//        public $text = '';
//        public $icon = '';
//        public $state = null;
//        public $li_attr = '';
//        public $a_attr = '';
        if ($currentNode != null) {
            $node = new Node();
            $node->id = $currentNode["ID"];
            $node->text = $currentNode["FolderName"];
            $node->parent = $currentNode["FolderParentID"] == "" ? "#" : $currentNode["FolderParentID"];
            if ($currentNode["FolderParentID"] == ""){
                $state = new State();
                $state->opened = true;
                $state->selected = false;
                $state->disabled = false;
                $node->state = $state;
            }

            array_push($arrayOut,$node);
            $arrTemp = array_filter($arrayIn, function ($row) use ($currentNode) {
                return $row["FolderParentID"] == $currentNode["ID"];
            });
            foreach ($arrTemp as $row){
                $this->createTreeViewData($row,$arrayIn,$arrayOut);
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



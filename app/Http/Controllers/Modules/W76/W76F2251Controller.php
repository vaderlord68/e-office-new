<?php

namespace App\Http\Controllers\Modules\W76;

use App\Http\Controllers\Controller;
use App\Models\D76T1556;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Node;
use State;
use Illuminate\Http\Request;

class  W76F2251Controller extends Controller
{

    private $d76T1556;

    public function __construct(D76T1556 $d76T1556)
    {
        $this->d76T1556 = $d76T1556;
    }

    public function index(Request $request, $task = '')
    {
        $lang = \Helpers::getLang();
        $userID = Auth::user()->UserID;
        $title = 'Cập nhật văn bản đến';

        switch ($task) {
            case '':
            case 'add':
                $divisonID = session('W76P0000', '')->DivisionID;
                $orgUnitID = session('W76P0000', '')->OrgUnitID;
                $sql = '--Do nguon cho treeview' . PHP_EOL;
                $sql .= "EXEC W76P9000 '$userID', '$divisonID','$orgUnitID' " . PHP_EOL;
                $rsTreeView = DB::connection()->select($sql);
                $processUserList = array_filter($rsTreeView, function ($row) {
                    return $row->IsEmployee == 1;
                });
                $cboDocGroupID = $this->d76T1556->where('ListTypeID', '=', 'D76T2250_DocGroup')->get();
                $cboEmergency = $this->d76T1556->where('ListTypeID', '=', 'D76T2250_Emergency')->get();
                $cboSecurity = $this->d76T1556->where('ListTypeID', '=', 'D76T2250_Security')->get();


                foreach ($rsTreeView as &$row) {
                    if ($row->OrgunitParentID == '') {
                        $row->OrgunitParentID = 0;
                    }
                    $row->check0 = 0;
                    $row->check1 = 0;
                    $row->check2 = 0;
                }
                $treeViewData = json_encode($rsTreeView);

                //$treeViewData = $this->getTreeView($rsTreeView);


                return View("modules.W76.W76f2251.W76f2251", compact('processUserList', 'cboSecurity', 'cboEmergency', 'cboDocGroupID', 'treeViewData', 'task', 'title', 'rsTreeView'));
                break;
            case 'save':
                $txtDocNo = $request->input('txtDocNo', '');
                $txtDivisionID = $request->input('txtDivisionID', '');
                $cboDocGroupID = $request->input('cboDocGroupID', '');
                $txtRefDocNo = $request->input('txtRefDocNo', '');
                $txtOrganization = $request->input('txtOrganization', '');
                $dtpReceiverDate = \Helpers::convertDate($request->input('dtpReceiverDate', ''));
                $cboEmergency = $request->input('cboEmergency', '');
                $cboSecurity = $request->input('cboSecurity', '');
                $txtContent = $request->input('txtContent', '');
                $txtProcessUser = implode(",", $request->input('txtProcessUser', '')) ; //array
                $data = json_encode($request->input('data', '[]'));
                $StatusID = 0;

                $DocType = "";
                $SentDate = null;
                $Signer = "";
                $Deleted = 0;
                $CreateUserID = Auth::user()->UserID;
                $LastModifyUserID = Auth::user()->UserID;

                $sql ="--Them moi van ban den".PHP_EOL;
                $sql .="Insert Into D76T2250(".PHP_EOL;
                $sql .="DocType, DocNo, DocGroupID, DivisionID, ".PHP_EOL;
                $sql .="Organization, SentDate, Signer, ReceiverDate, Content, ".PHP_EOL;
                $sql .="StatusID, RefDocNo, Emergency, Security, Deleted, ".PHP_EOL;
                $sql .="CreateUserID, CreateDate, LastModifyUserID, LastModifyDate".PHP_EOL;
                $sql .=") Values(".PHP_EOL;
                $sql .="'$DocType', '$txtDocNo', '$cboDocGroupID', '$txtDivisionID', ".PHP_EOL;
                $sql .=" N'$txtOrganization', $SentDate,  N'$Signer', '$dtpReceiverDate',  N'$txtContent', ".PHP_EOL;
                $sql .="$StatusID, '$txtRefDocNo', '$cboEmergency', '$cboSecurity', $Deleted, ".PHP_EOL;
                $sql .="'$CreateUserID', getdate(), '$LastModifyUserID', getdate()".PHP_EOL;
                $sql .=")";

                $sql ="--Them moi van ban den chi tiet".PHP_EOL;
                $sql .="Insert Into D76T2251(".PHP_EOL;
                $sql .="DocType, DocNo, DocGroupID, DivisionID, ".PHP_EOL;
                $sql .="Organization, SentDate, Signer, ReceiverDate, Content, ".PHP_EOL;
                $sql .="StatusID, RefDocNo, Emergency, Security, Deleted, ".PHP_EOL;
                $sql .="CreateUserID, CreateDate, LastModifyUserID, LastModifyDate, ID, ".PHP_EOL;
                $sql .="DocType, DocNo, DocGroupID, DivisionID, Organization, ".PHP_EOL;
                $sql .="SentDate, Signer, ReceiverDate, Content, StatusID, ".PHP_EOL;
                $sql .="RefDocNo, Emergency, Security, Deleted, CreateUserID, ".PHP_EOL;
                $sql .="CreateDate, LastModifyUserID, LastModifyDate".PHP_EOL;
                $sql .=") Values(".PHP_EOL;
                $sql .="'$DocType', '$DocNo', '$DocGroupID', '$DivisionID', ".PHP_EOL;
                $sql .=" N'$Organization', '$SentDate',  N'$Signer', '$ReceiverDate',  N'$Content', ".PHP_EOL;
                $sql .="$StatusID, '$RefDocNo', '$Emergency', '$Security', $Deleted, ".PHP_EOL;
                $sql .="'$CreateUserID', '$CreateDate', '$LastModifyUserID', '$LastModifyDate', $ID, ".PHP_EOL;
                $sql .="'$DocType', '$DocNo', '$DocGroupID', '$DivisionID',  N'$Organization', ".PHP_EOL;
                $sql .="'$SentDate',  N'$Signer', '$ReceiverDate',  N'$Content', $StatusID, ".PHP_EOL;
                $sql .="'$RefDocNo', '$Emergency', '$Security', $Deleted, '$CreateUserID', ".PHP_EOL;
                $sql .="'$CreateDate', '$LastModifyUserID', '$LastModifyDate'".PHP_EOL;
                $sql .=")";


                \Debugbar::info($txtProcessUser);
                \Debugbar::info($data);

                break;
        }
    }

    private function getTreeView2($rsTreeView, &$output)
    {
        $json = [];
        $arr = array_filter($rsTreeView, function ($row) {
            return $row->OrgunitParentID == '';
        });
        foreach ($arr as $currentNode) {
            $json = $this->createTreeViewData($currentNode, $rsTreeView, $json);
            $json = json_encode($json);
        }

        return $json;
    }

    private function getTreeView($rsTreeView)
    {
        $json = [];
        $arr = array_filter($rsTreeView, function ($row) {
            return $row->OrgunitParentID == '';
        });
        foreach ($arr as $currentNode) {
            $json = $this->createTreeViewData($currentNode, $rsTreeView, $json);
            $json = json_encode($json);
        }

        return $json;
    }

//    private function createTreeViewData($currentNode, $arrayIn, &$arrayOut)
//    {
//        \Debugbar::info($currentNode);
//        $node = new Node();
//        $node->id = $currentNode->OrgunitID;
//
//
//        if ($currentNode->IsEmployee == 1) {
//            //$node->text = '<img src="http://thuthuat123.com/uploads/2018/01/27/anh-dai-dien-dep-nhat-56_095736.jpg" width="25px" height="25px" style="border-radius: 50%" />' . $currentNode->OrgunitName . $supfix;
//        } else {
//            //$node->text = $currentNode->OrgunitName . $supfix;
//            //$node->text =$currentNode->OrgunitName;
//        }
//        $node->id =$currentNode->OrgunitID;
//        $node->text =$currentNode->OrgunitName;
//        $node->icon = '';
//        $node->parent = $currentNode->OrgunitParentID == "" ? "#" : $currentNode->OrgunitParentID;
//
//        $state = new State();
//        $state->opened = true;
//        $state->selected = false;
//        $state->disabled = false;
//        $node->state = $state;
//
//        array_push($arrayOut, $node);
//        $arrTemp = array_filter($arrayIn, function ($row) use ($currentNode) {
//            return $row->OrgunitParentID == $currentNode->OrgunitID;
//        });
//        foreach ($arrTemp as $row) {
//            $this->createTreeViewData($row, $arrayIn, $arrayOut);
//        }
//
//        return $arrayOut;
//    }

    private function createTreeViewData($currentNode, $arrayIn, &$arrayOut)
    {
        \Debugbar::info($currentNode);
        $node = new Node();
        $node->id = $currentNode->OrgunitID;

        $node->id = $currentNode->OrgunitID;
        $node->text = $currentNode->OrgunitName;
        $node->icon = '';
        $node->parent = $currentNode->OrgunitParentID == "" ? "0" : $currentNode->OrgunitParentID;

        $state = new State();
        $state->opened = true;
        $state->selected = false;
        $state->disabled = false;
        $node->state = $state;

        array_push($arrayOut, $node);
        $arrTemp = array_filter($arrayIn, function ($row) use ($currentNode) {
            return $row->OrgunitParentID == $currentNode->OrgunitID;
        });
        foreach ($arrTemp as $row) {
            $this->createTreeViewData($row, $arrayIn, $arrayOut);
        }

        return $arrayOut;
    }
}

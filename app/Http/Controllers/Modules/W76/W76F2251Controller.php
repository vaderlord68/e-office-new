<?php

namespace App\Http\Controllers\Modules\W76;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Node;
use State;


class  W76F2251Controller extends Controller
{
    protected $newsHelper;

    public function index($task = '')
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
                $treeViewData = $this->getTreeView($rsTreeView);


                return View("modules.W76.W76f2251.W76f2251", compact('treeViewData', 'task', 'title', 'rsTreeView'));
                break;

        }
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

    private function createTreeViewData($currentNode, $arrayIn, &$arrayOut)
    {
        \Debugbar::info($currentNode);
        $node = new Node();
        $node->id = $currentNode->OrgunitID;

//        $supfix = '<div class="form-check checkbox pull-right">'.PHP_EOL;
//        $supfix .= '<input class="form-check-input" id="check1" type="checkbox" value="">'.PHP_EOL;
//        $supfix .= '<label class="form-check-label" for="check1">Option 1</label>'.PHP_EOL;
//        $supfix .= '</div>'.PHP_EOL;


        $supfix = '<div class="row">' . PHP_EOL;
        $supfix .= '<div class="col-sm">' . PHP_EOL;
        $supfix .= 'One of three columns' . PHP_EOL;
        $supfix .= '</div>' . PHP_EOL;
        $supfix .= '<div class="col-sm">' . PHP_EOL;
        $supfix .= 'One of three columns' . PHP_EOL;
        $supfix .= '</div>' . PHP_EOL;
        $supfix .= '<div class="col-sm">' . PHP_EOL;
        $supfix .= 'One of three columns' . PHP_EOL;
        $supfix .= '</div>' . PHP_EOL;

        if ($currentNode->IsEmployee == 1) {
            //$node->text = '<img src="http://thuthuat123.com/uploads/2018/01/27/anh-dai-dien-dep-nhat-56_095736.jpg" width="25px" height="25px" style="border-radius: 50%" />' . $currentNode->OrgunitName . $supfix;
        } else {
            //$node->text = $currentNode->OrgunitName . $supfix;
            $node->text = $supfix;
        }

        $node->icon = '';
        $node->parent = $currentNode->OrgunitParentID == "" ? "#" : $currentNode->OrgunitParentID;

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

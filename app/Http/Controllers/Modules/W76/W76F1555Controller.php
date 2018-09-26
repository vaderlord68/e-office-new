<?php

namespace App\Http\Controllers\Modules\W76;

use App\Http\Controllers\Controller;
use App\Models\D76T1555;
use App\Models\D76T1556;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;


class  W76F1555Controller extends Controller
{
    protected $newsHelper;
    public function index($task = '')
    {
        $lang = \Helpers::getLang();
        $userID = \Helpers::getSession('current_user');
        \Debugbar::info($lang);

        switch ($task) {
            case '':
                $d76T1555 = new D76T1555();
                $listTypeID = $d76T1555->getList();
                 return View("modules.W76.W76f1555.W76f1555", compact( 'listTypeID','lang'));
                break;
            case 'load':
                $type = Input::get('listTypeID', '');
                $d76T1556 = new D76T1556();
                $dataGrid = $d76T1556->getList($type);
                return $dataGrid;
                break;
            case 'delete';
                $codeID = Input::get('codeID', '');
                $listTypeID = Input::get('listTypeID', '');
                $sql = "--Update D76T1556" . PHP_EOL;
                $sql .= "Update D76T1556 set Disabled=1" ;
                $sql .= " Where  CodeID  = '$codeID' and ListTypeID = '$listTypeID'" . PHP_EOL;
                DB::statement($sql);

                $sql = "-- Do nguon cho luoi" . PHP_EOL;
                $sql .= "select * from D76T1556 with (nolock) where Disabled = 0 and ListTypeID = '$listTypeID' order by DisplayOrder,CodeName,CodeID  ";
                $dataGrid =  DB::select($sql);
                return $dataGrid;
                break;
            case 'update':
                $rowData =json_decode(Input::get('RowData', ''));
                $codeID = $rowData->CodeID;
                $listTypeID= Input::get('listTypeID', '');
                $sql="";
                if ($rowData->ID == "") {
                    $sql = "-- Kiem tra trung ma" . PHP_EOL;
                    $sql .= "select top 1 1 from D76T1556 with (nolock) where  CodeID = '$codeID' and Disabled =0 and ListTypeID = '$listTypeID' ";
                    $result = DB::select($sql);
                    if (count($result) > 0)
                        return -1;
                }
                else
                {
                    $sql = "--Delete D76T1556" . PHP_EOL;
                    $sql .= "Delete From D76T1556";
                    $sql .= " Where CodeID  = '$codeID' and ListTypeID = '$listTypeID'" . PHP_EOL;
                }
                $CodeName = $rowData->CodeName;
                $Remark = $rowData->Remark;
                $DisplayOrder = $rowData->DisplayOrder;
                $Inactive = \Helpers::sqlNumber($rowData->Inactive);
                $CreateUserID = $rowData->CreateUserID;
                $CreateDate = $rowData->CreateDate;
                if ($CreateUserID == "")
                    $CreateUserID = $userID;
                if ($CreateDate == "")
                    $CreateDate = Carbon::now();
                $IsDefault = $rowData->IsDefault==false ? 0:1;

                if ($IsDefault == 1)
                {
                    $sqlchk = "-- Kiem tra ton tai IsDefault" . PHP_EOL;
                    $sqlchk .= "select CodeID from D76T1556 with (nolock) where IsDefault = 1 and ListTypeID = '$listTypeID'  ";
                    $result2 = DB::select($sqlchk);
                    foreach ($result2 as $item) {
                        $ID = $item->CodeID;
                        $sql .= "--Update IsDefault D76T1556" . PHP_EOL;
                        $sql .= "Update D76T1556 set IsDefault =0 where CodeID ='$ID'" . PHP_EOL;
                    }
                }

                $sql .= "--Insert D76T1556" . PHP_EOL;
                $sql .= "Insert Into D76T1556(" . PHP_EOL;
                $sql .= "ListTypeID, CodeID, CodeName, Remark, " . PHP_EOL;
                $sql .= "DisplayOrder, IsDefault, Inactive, CreateUserID, " . PHP_EOL;
                $sql .= "CreateDate, LastModifyUserID, LastModifyDate" . PHP_EOL;
                $sql .= ") Values(" . PHP_EOL;
                $sql .= "'$listTypeID', '$codeID',  N'$CodeName',  N'$Remark', " . PHP_EOL;
                $sql .= "$DisplayOrder, $IsDefault, $Inactive,  '$CreateUserID', " . PHP_EOL;
                $sql .= "'$CreateDate', '$userID',getdate()" . PHP_EOL;
                $sql .= ")" . PHP_EOL;
                DB::statement($sql);
                $sql = "-- Do nguon cho luoi" . PHP_EOL;
                $sql .= "select * from D76T1556 with (nolock) where Disabled = 0 and ListTypeID = '$listTypeID' order by DisplayOrder,CodeName,CodeID  ";
                $dataGrid = DB::select($sql);
                return $dataGrid;
                break;


        }
    }
}

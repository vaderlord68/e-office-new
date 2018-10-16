<?php

namespace App\Http\Controllers\Modules\W78;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use SplFileInfo;


class  W76F2131Controller extends Controller
{

    public function index(Request $request, $task = '')

    {

        $sql = "--Combo Phân loại:" . PHP_EOL;
        $sql .= "SELECT CodeID as ID ,CodeName as Name" . PHP_EOL;
        $sql .= "FROM D76T1556 " . PHP_EOL;
        $sql .= "WHERE ListTypeID = 'D76T2130_Contract'" . PHP_EOL;
        $rsContractType = DB::select($sql);

        $sql = "--Combo Nguoi dai dien:" . PHP_EOL;
        $sql .= "SELECT CodeID as ID,CodeName as Name" . PHP_EOL;
        $sql .= "FROM D76T1556 " . PHP_EOL;
        $sql .= "WHERE ListTypeID = 'D76T2130_Presenter'" . PHP_EOL;
        $rsSignerID = DB::select($sql);

        $sql = "--Combo Trạng thái:" . PHP_EOL;
        $sql .= "SELECT CodeID as ID,CodeName as Name" . PHP_EOL;
        $sql .= "FROM D76T1556" . PHP_EOL;
        $sql .= "WHERE ListTypeID = 'D76T2130_Status'" . PHP_EOL;
        $rsStatusID = DB::select($sql);


        switch ($task) {
            case 'add':
                \Debugbar::info($rsStatusID);
                return view("modules/W78/W76F2130/W76F2131", compact('task', 'rsContractType', 'rsSignerID', 'rsStatusID'));
                break;
            case 'edit':
                //return "test";
                $ID = $request->input('ID', '');
                $sql = "--Load master" . PHP_EOL;
                $sql .= "select convert(varchar,LastModifyDate, 103) as LastModifyDate1, convert(varchar,CreateDate, 103) as CreateDate1, convert(varchar,EffectDateFrom, 103) as EffectDateFrom1, convert(varchar,EffectDateTo, 103) as EffectDateTo1, * from D76T2130 where ID = $ID" . PHP_EOL;
                $rsData = DB::selectOne($sql);
                //var_dump($rsData);die;
                \Debugbar::info($rsData);
                return view("modules/W78/W76F2130/W76F2131", compact('rsData', 'task', 'rsContractType', 'rsSignerID', 'rsStatusID'));
                break;
            case 'download':
                $ID = $request->input('ID', '');
                $query = "SELECT  *  FROM 	D76T2130 WITH(NOLOCK) WHERE	ID = $ID";
                $rs = DB::selectOne($query);
                if ($rs->FileContent == '') return '';
                $fileName = $rs->FileName;
                $content = $rs->FileContent;

                $d = new DateTime();
                $nameTemp = $d->getTimestamp();
                $info = new SplFileInfo($fileName);
                $ext = $info->getExtension();

                if (!file_exists(storage_path() . "\downloads\\")) {
                    mkdir(storage_path() . "\downloads\\");
                }

                $pathSave = str_replace("//", "/", storage_path() ."/downloads/". $nameTemp . "." . $ext);
                //Write file
                $fp = fopen($pathSave, 'w');
                fwrite($fp, $content);
                fclose($fp);
                return Response::download($pathSave);
                break;

            case 'removefile':
                $ID = $request->input('ID', '');
                $query = "update D76T2130 set FileContent = null , FileName = '' where ID = $ID";
                try {
                    DB::statement($query);
                    \Helpers::setSession('successMessage', 'Tập tin đính kèm đã xoá thành công.');
                    return json_encode(['status' => 'SUCC']);
                } catch (\Exception $ex) {
                    \Helpers::log($ex->getMessage());
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }
                break;
            case 'save':
                $ID = $request->input('ID', '');

                $txtContractNo = \Helpers::sqlstring($request->input('txtContractNo', ''));
                $txtPartner = \Helpers::sqlstring($request->input('txtPartner', ''));
                $cboContractType = \Helpers::sqlstring($request->input('cboContractType', ''));
                $cboSignerID = \Helpers::sqlstring($request->input('cboSignerID', ''));
                $cboStatusID = \Helpers::sqlstring($request->input('cboStatusID', ''));
                $dtpEffectDateFrom = \Helpers::convertDate($request->input('dtpEffectDateFrom', ''));
                $dtpEffectDateTo = \Helpers::convertDate($request->input('dtpEffectDateTo', ''));
                $txtContent = \Helpers::sqlstring($request->input('txtContent', ''));
                $txtSheftNo = \Helpers::sqlstring($request->input('txtSheftNo', ''));
                $txtFloorNo = \Helpers::sqlstring($request->input('txtFloorNo', ''));
                $txtPartitionNo = \Helpers::sqlstring($request->input('txtPartitionNo', ''));
                $txtFolderNo = \Helpers::sqlstring($request->input('txtFolderNo', ''));

                $CreateUserID = Auth::user()->UserID;
                $CreateDate = Carbon::now();
                $byteArray = null;
                $fileName = "";

                $sql = "--Kiem tra trung" . PHP_EOL;
                $sql .= "select *  from D76T2130 where ContractNo = '$txtContractNo'" . PHP_EOL;
                if (DB::connection()->selectOne($sql) != null){
                    return json_encode(['status' => 'ERROR', 'message' => 'Hợp đồng này đã tồn tại trong hệ thống']);
                }

                if ($request->hasFile('file')) {
                    \Debugbar::info("sdfdsf");
                    $file = $request->file('file', null);
                    $fileName = $file->getClientOriginalName();
                    $byteArray = ("0x" . bin2hex(file_get_contents($file->getRealPath())));

                    $sql = "----Insert hop dong" . PHP_EOL;
                    $sql .= "Insert Into D76T2130(" . PHP_EOL;
                    $sql .= "ContractNo, ContractType, Partner, SignerID, " . PHP_EOL;
                    $sql .= "Content, StatusID, EffectDateFrom, EffectDateTo, SheftNo, " . PHP_EOL;
                    $sql .= "FloorNo, PartitionNo, FolderNo, Deleted, CreateUserID, " . PHP_EOL;
                    $sql .= "CreateDate, LastModifyUserID, LastModifyDate, FileName, FileContent" . PHP_EOL;
                    $sql .= ") Values(" . PHP_EOL;
                    $sql .= "'$txtContractNo', '$cboContractType',  N'$txtPartner', '$cboSignerID', " . PHP_EOL;
                    $sql .= " N'$txtContent', '$cboStatusID', $dtpEffectDateFrom, $dtpEffectDateTo,  N'$txtSheftNo', " . PHP_EOL;
                    $sql .= " N'$txtFloorNo',  N'$txtPartitionNo',  N'$txtFolderNo', 0, '$CreateUserID', " . PHP_EOL;
                    $sql .= "'$CreateDate', '$CreateUserID', '$CreateDate', '$fileName', $byteArray" . PHP_EOL;
                    $sql .= ")";
                } else {
                    $sql = "----Insert hop dong" . PHP_EOL;
                    $sql .= "Insert Into D76T2130(" . PHP_EOL;
                    $sql .= "ContractNo, ContractType, Partner, SignerID, " . PHP_EOL;
                    $sql .= "Content, StatusID, EffectDateFrom, EffectDateTo, SheftNo, " . PHP_EOL;
                    $sql .= "FloorNo, PartitionNo, FolderNo, Deleted, CreateUserID, " . PHP_EOL;
                    $sql .= "CreateDate, LastModifyUserID, LastModifyDate" . PHP_EOL;
                    $sql .= ") Values(" . PHP_EOL;
                    $sql .= "'$txtContractNo', '$cboContractType',  N'$txtPartner', '$cboSignerID', " . PHP_EOL;
                    $sql .= " N'$txtContent', '$cboStatusID', $dtpEffectDateFrom, $dtpEffectDateTo,  N'$txtSheftNo', " . PHP_EOL;
                    $sql .= " N'$txtFloorNo',  N'$txtPartitionNo',  N'$txtFolderNo', 0, '$CreateUserID', " . PHP_EOL;
                    $sql .= "'$CreateDate', '$CreateUserID', '$CreateDate'" . PHP_EOL;
                    $sql .= ")";
                }


                try {
                    DB::statement($sql);
                    \Helpers::setSession('successMessage', 'Hợp đồng đã được lưu thành công');

                    return json_encode(['status' => 'SUCC', 'message' => 'Hợp đồng đã được lưu thành công', 'redirectTo' => $_SERVER["HTTP_REFERER"]]);
                } catch (\Exception $ex) {
                    \Helpers::log($ex->getMessage());
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }
                break;
            case 'update':
                $ID = $request->input('ID', '');

                $txtContractNo = \Helpers::sqlstring($request->input('txtContractNo', ''));
                $txtPartner = \Helpers::sqlstring($request->input('txtPartner', ''));
                $cboContractType = \Helpers::sqlstring($request->input('cboContractType', ''));
                $cboSignerID = \Helpers::sqlstring($request->input('cboSignerID', ''));
                $cboStatusID = \Helpers::sqlstring($request->input('cboStatusID', ''));
                $dtpEffectDateFrom = \Helpers::convertDate($request->input('dtpEffectDateFrom', ''));
                $dtpEffectDateTo = \Helpers::convertDate($request->input('dtpEffectDateTo', ''));
                $txtContent = \Helpers::sqlstring($request->input('txtContent', ''));
                $txtSheftNo = \Helpers::sqlstring($request->input('txtSheftNo', ''));
                $txtFloorNo = \Helpers::sqlstring($request->input('txtFloorNo', ''));
                $txtPartitionNo = \Helpers::sqlstring($request->input('txtPartitionNo', ''));
                $txtFolderNo = \Helpers::sqlstring($request->input('txtFolderNo', ''));

                $CreateUserID = Auth::user()->UserID;
                $CreateDate = Carbon::now();
                $byteArray = null;
                $fileName = "";


                if ($request->hasFile('file')) {
                    \Debugbar::info("sdfdsf");
                    $file = $request->file('file', null);
                    $fileName = $file->getClientOriginalName();
                    $byteArray = ("0x" . bin2hex(file_get_contents($file->getRealPath())));

                    $sql ="--Cap nhat hop dong".PHP_EOL;
                    $sql .="Update D76T2130 Set ".PHP_EOL;
                    $sql .="ContractNo = '$txtContractNo',".PHP_EOL;
                    $sql .="ContractType = '$cboContractType',".PHP_EOL;
                    $sql .="Partner =  N'$txtPartner',".PHP_EOL;
                    $sql .="SignerID = '$cboSignerID',".PHP_EOL;
                    $sql .="Content =  N'$txtContent',".PHP_EOL;
                    $sql .="StatusID = '$cboStatusID',".PHP_EOL;
                    $sql .="EffectDateFrom = $dtpEffectDateFrom,".PHP_EOL;
                    $sql .="EffectDateTo = $dtpEffectDateTo,".PHP_EOL;
                    $sql .="SheftNo =  N'$txtSheftNo',".PHP_EOL;
                    $sql .="FloorNo =  N'$txtFloorNo',".PHP_EOL;
                    $sql .="PartitionNo =  N'$txtPartitionNo',".PHP_EOL;
                    $sql .="FolderNo =  N'$txtFolderNo',".PHP_EOL;
                    $sql .="Deleted = 0,".PHP_EOL;

                    $sql .="LastModifyUserID = '$CreateUserID',".PHP_EOL;
                    $sql .="LastModifyDate = '$CreateDate',".PHP_EOL;
                    $sql .="FileName =  N'$fileName',".PHP_EOL;
                    $sql .="FileContent = $byteArray".PHP_EOL;
                    $sql .=" Where ID = $ID".PHP_EOL;


                } else {
                    $sql ="--Cap nhat hop dong".PHP_EOL;
                    $sql .="Update D76T2130 Set ".PHP_EOL;
                    $sql .="ContractNo = '$txtContractNo',".PHP_EOL;
                    $sql .="ContractType = '$cboContractType',".PHP_EOL;
                    $sql .="Partner =  N'$txtPartner',".PHP_EOL;
                    $sql .="SignerID = '$cboSignerID',".PHP_EOL;
                    $sql .="Content =  N'$txtContent',".PHP_EOL;
                    $sql .="StatusID = '$cboStatusID',".PHP_EOL;
                    $sql .="EffectDateFrom = $dtpEffectDateFrom,".PHP_EOL;
                    $sql .="EffectDateTo = $dtpEffectDateTo,".PHP_EOL;
                    $sql .="SheftNo =  N'$txtSheftNo',".PHP_EOL;
                    $sql .="FloorNo =  N'$txtFloorNo',".PHP_EOL;
                    $sql .="PartitionNo =  N'$txtPartitionNo',".PHP_EOL;
                    $sql .="FolderNo =  N'$txtFolderNo',".PHP_EOL;
                    $sql .="Deleted = 0,".PHP_EOL;

                    $sql .="LastModifyUserID = '$CreateUserID',".PHP_EOL;
                    $sql .="LastModifyDate = '$CreateDate'".PHP_EOL;
                    $sql .=" Where ID = $ID".PHP_EOL;
                }


                try {
                    DB::statement($sql);
                    \Helpers::setSession('successMessage', 'Hợp đồng đã được cập nhật thành công.');
                    return json_encode(['status' => 'SUCC', 'message' => 'Hợp đồng đã được cập nhật thành công.', 'redirectTo' => $_SERVER["HTTP_REFERER"]]);
                } catch (\Exception $ex) {
                    \Helpers::log($ex->getMessage());
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }
                break;
        }


    }

}




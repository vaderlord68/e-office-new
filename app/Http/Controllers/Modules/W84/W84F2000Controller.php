<?php

namespace App\Http\Controllers\Modules\W84;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Helpers;
use Illuminate\Support\Facades\Auth;
class  W84F2000Controller extends Controller
{
    public function index($task = "", Request $request)

    {
        $userID = Auth::user()->UserID;
        $divisionID = session('W76P0000')->DivisionID;
        $orgUnitID = session('W76P0000')->OrgUnitID;
        $lang = \Helpers::getLang();
         switch ($task) {
             case 'check':
                 $all = $request->input();
                 $projectID = $all['projectID'];

                 $sql ="--Kiem tra truoc khi Xoa".PHP_EOL;
                 $sql .= "EXEC W76P5555 " .PHP_EOL;
                 $sql .= "'$divisionID',".PHP_EOL; //DivisionID, varchar[50], NOT NULL
                 $sql .= "'$lang',".PHP_EOL; //Language, varchar[2], NOT NULL
                 $sql .= "1,".PHP_EOL; //CodeTable, tinyint, NOT NULL
                 $sql .= "'$userID',".PHP_EOL; //UserID, varchar[50], NOT NULL
                 $sql .= "'D',".PHP_EOL; //Mode, varchar[50], NOT NULL
                 $sql .= "'W84F2000',".PHP_EOL; //FormID, varchar[50], NOT NULL
                 $sql .= "'$projectID',".PHP_EOL; //CodeID, varchar[50], NOT NULL
                 $sql .= " N'',".PHP_EOL; //Key01ID, nvarchar, NOT NULL
                 $sql .= " N'',".PHP_EOL; //Key02ID, nvarchar, NOT NULL
                 $sql .= " N'',".PHP_EOL; //Key03ID, nvarchar, NOT NULL
                 $sql .= " N'',".PHP_EOL; //Key04ID, nvarchar, NOT NULL
                 $sql .= " N'',".PHP_EOL; //Key05ID, nvarchar, NOT NULL
                 $sql .= "0,".PHP_EOL; //Num01, decimal, NOT NULL
                 $sql .= "0,".PHP_EOL; //Num02, decimal, NOT NULL
                 $sql .= "0,".PHP_EOL; //Num03, decimal, NOT NULL
                 $sql .= "0,".PHP_EOL; //Num04, decimal, NOT NULL
                 $sql .= "0,".PHP_EOL; //Num05, decimal, NOT NULL
                 $sql .= "'',".PHP_EOL; //Dat01, datetime, NOT NULL
                 $sql .= "'',".PHP_EOL; //Dat02, datetime, NOT NULL
                 $sql .= "'',".PHP_EOL; //Dat03, datetime, NOT NULL
                 $sql .= "'',".PHP_EOL; //Dat04, datetime, NOT NULL
                 $sql .= "''"; //Dat05, datetime, NOT NULL
                 try {
                     $result =  DB::select($sql);
                     return $result;
                 } catch (\Exception $e) {
                     \Debugbar::info($e->getMessage());
                     return '';
                 }
                 break;
             case 'delete':
                 $all = $request->input();
                 $projectID = $all['projectID'];

                 $sql ="--Xoa Du an".PHP_EOL;
                 $sql .= "EXEC W84P2001 " .PHP_EOL;
                 $sql .= "'$userID',".PHP_EOL; //UserID, varchar[50], NOT NULL
                 $sql .= "'$orgUnitID',".PHP_EOL; //OrgUnitID, varchar[50], NOT NULL
                 $sql .= "'$divisionID',".PHP_EOL; //DivisionID, varchar[50], NOT NULL
                 $sql .= "'$projectID'"; //ProjectID, varchar[50], NOT NULL
                 try {
                     DB::beginTransaction();
                     DB::statement($sql);
                     DB::commit();
                     return '1';
                 } catch (\Exception $e) {
                     \Debugbar::info($e->getMessage());
                     DB::rollBack();
                     return '0';
                 }
                 break;
            case 'pagination':
             case '':
             $projectList = DB::table('D76T2300')
                 ->select('D76T2300.ProjectID'
                     ,'D76T2300.ProjectName'
                     ,'D76T2300.StatusID'
                     ,'D76T2300.EmployeeID'
                     ,'D76T1556.CodeName as StatusName'
                     ,'D76T2300.StartDate'
                     ,'D76T2300.Deadline'
                     ,'D76T2300.Remark'
                     ,'D76T2300.CreateDate'
                     ,'D76T2300.CreateUserID'
                     , 'T2.FullName as CreateUserName'
                     , 'D76T2300.LastModifyDate'
                     , 'D76T2300.LastModifyUserID'
                     , 'D76T2300.DisplayOrder'
                     , DB::raw('60 as ManDay')
                     , 'T1.FullName as EmployeeName')
                 ->leftJoin('D76T1556', function ($join) {
                     $join->on('D76T2300.StatusID', '=', 'D76T1556.CodeID')
                         ->where('D76T1556.ListTypeID', '=', 'D84F2000_StatusID');
                 })
                 ->leftJoin('D76T9020 as T1','D76T2300.EmployeeID', '=', 'T1.EmployeeCode')
                 ->leftJoin('D76T9020 as T2','D76T2300.CreateUserID', '=', 'T2.EmployeeCode')
                 ->where('D76T1556.Disabled', '=', 0)
                 ->orderBy('D76T2300.CreateDate', 'desc')
                 ->orderBy('D76T2300.DisplayOrder', 'desc')
                 ->paginate(4);

             foreach ($projectList as $row){
                 $projectID = $row->ProjectID;

                 $sql ="--Do nguon thanh vien".PHP_EOL;
                 $sql .= "EXEC W84P2002 " .PHP_EOL;
                 $sql .= "'$userID',".PHP_EOL; //UserID, varchar[50], NOT NULL
                 $sql .= "'$orgUnitID',".PHP_EOL; //OrgUnitID, varchar[50], NOT NULL
                 $sql .= "'$divisionID',".PHP_EOL; //DivisionID, varchar[50], NOT NULL
                 $sql .= "'$projectID'"; //ProjectID, varchar[50], NOT NULL
                 $memberList = DB::select($sql);
                 foreach ($memberList as &$item) {
                     if ($item->Thumnail == "") {
                         $item->Thumnail = asset('media/available.png');
                     } else {
                         $item->Thumnail = 'data:image/jpeg;base64,' . base64_encode($item->Thumnail);
                     }
                 }

                 $row->memberList = $memberList;

             }
             \Debugbar::info($projectList);
             if ($task=='pagination'){
                 if ($request->ajax()){
                     return view("modules/W84/W84F2000/pagination_data",compact('projectList'))->render();
                 }
             }else{
                 return view("modules/W84/W84F2000/W84F2000",compact('projectList'));
             }
                break;
        }

    }

}

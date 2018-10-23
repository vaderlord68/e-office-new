<?php

namespace App\Http\Controllers\Modules\W84;

use App\Http\Controllers\Controller;
use App\Models\D76T1556;
use App\Models\D76T2140;
use App\Models\D76T2141;
use App\Models\D76T2280;
use App\Models\D76T2300;
use App\Models\D76T2301;
use App\Models\D76T9020;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class  W84F2001Controller extends Controller
{
    private $d76T1556;
    private $d76T2300;
    private $d76T2301;
    private $d76T2280;

    public function __construct(D76T1556 $d76T1556, D76T2300 $d76T2300, D76T2301 $d76T2301, D76T2280 $d76T2280)
    {
        $this->d76T1556 = $d76T1556;
        $this->d76T2300 = $d76T2300;
        $this->d76T2301 = $d76T2301;
        $this->d76T2280 = $d76T2280;
    }

    public function index($task = "", Request $request)
    {
        $userID = Auth::user()->UserID;
        $divisionID = session('W76P0000')->DivisionID;
        $orgUnitID = session('W76P0000')->OrgUnitID;
        $lang = \Helpers::getLang();
        switch ($task) {
            case 'add':
                $sql ="--Do nguon ...".PHP_EOL;
                $sql .= "EXEC W84P2002 " .PHP_EOL;
                $sql .= "'$userID',".PHP_EOL; //UserID, varchar[50], NOT NULL
                $sql .= "'$orgUnitID',".PHP_EOL; //OrgUnitID, varchar[50], NOT NULL
                $sql .= "'$divisionID',".PHP_EOL; //DivisionID, varchar[50], NOT NULL
                $sql .= "''"; //ProjectID, varchar[50], NOT NULL

                $members = DB::select($sql);
                \Debugbar::info($sql);
                \Debugbar::info($members);
                $sql ="--Do nguon Vai tro".PHP_EOL;
                $sql .= "Select CodeID, CodeName".PHP_EOL;
                $sql .=" From D76T1556 WITH(NOLOCK) ".PHP_EOL;
                $sql .=" Where ListTypeID = 'D84F2000_ RoleID'".PHP_EOL;

                $roles = DB::select($sql);

                $priorityList = $this->d76T1556->select('CodeID', 'CodeName')->where('ListTypeID', "=", 'D84F1000_Priority')->get();
                $statusList = $this->d76T1556->select('CodeID', 'CodeName')->where('ListTypeID', "=", 'D84F2000_StatusID')->get();

                \Debugbar::info($priorityList);

                $projectList= $this->d76T2300->select('ProjectID', 'ProjectName')->orderBy('ProjectName', 'desc')->get();

                \Debugbar::info($projectList);

                $stageList = $this->d76T2301->select('ProjectID', 'StageID', 'StageName')->orderBy('StageName', 'desc')->get();
                \Debugbar::info($stageList);

                $sql = '--Do nguon cho nguoi theo doi' . PHP_EOL;
                $sql .= "EXEC W76P9020 '$divisionID', 'EMP'";
                $empFollowList = DB::select($sql);
                foreach ($empFollowList as &$item) {
                    if ($item->Thumnail == "") {
                        $item->Thumnail = asset('media/available.png');
                    } else {
                        $item->Thumnail = 'data:image/jpeg;base64,' . base64_encode($item->Thumnail);
                    }
                }
                \Debugbar::info($empFollowList);

                return view("modules/W84/W84F2001/W84F2001",compact('empFollowList','statusList','task','members','roles'));
                break;
            case 'view':
            case 'edit':
                $all = $request->input();
                $projectID = $all['projectID'];
            \Debugbar::info($projectID);
                $sql ="--Do nguon thanh vien".PHP_EOL;
                $sql .= "EXEC W84P2002 " .PHP_EOL;
                $sql .= "'$userID',".PHP_EOL; //UserID, varchar[50], NOT NULL
                $sql .= "'$orgUnitID',".PHP_EOL; //OrgUnitID, varchar[50], NOT NULL
                $sql .= "'$divisionID',".PHP_EOL; //DivisionID, varchar[50], NOT NULL
                $sql .= "'$projectID'"; //ProjectID, varchar[50], NOT NULL
            \Debugbar::info($sql);
                $members = DB::select($sql);
//            unset($members['Thumnail']);
            foreach ($members as &$item) {
//                if ($item->Thumnail == "") {
//                    $item->Thumnail = asset('media/available.png');
//                } else {
//                    $item->Thumnail = 'data:image/jpeg;base64,' . base64_encode($item->Thumnail);
//                }
                unset($item->Thumnail);
            }
            \Debugbar::info($members);


                $sql ="--Do nguon Vai tro".PHP_EOL;
                $sql .= "Select CodeID, CodeName".PHP_EOL;
                $sql .=" From D76T1556 WITH(NOLOCK) ".PHP_EOL;
                $sql .=" Where ListTypeID = 'D84F2000_ RoleID'".PHP_EOL;

                $roles = DB::select($sql);
                $statusList = $this->d76T1556->select('CodeID', 'CodeName')->where('ListTypeID', "=", 'D84F2000_StatusID')->get();

                $projectProp= $this->d76T2300->where('ProjectID', "=", $projectID)->first();
                 \Debugbar::info($projectProp);
                $sql = '--Do nguon cho nguoi theo doi' . PHP_EOL;
                $sql .= "EXEC W76P9020 '$divisionID', 'EMP'";
                $empFollowList = DB::select($sql);
                foreach ($empFollowList as &$item) {
                    if ($item->Thumnail == "") {
                        $item->Thumnail = asset('media/available.png');
                    } else {
                        $item->Thumnail = 'data:image/jpeg;base64,' . base64_encode($item->Thumnail);
                    }
                }
                \Debugbar::info($empFollowList);

                return view("modules/W84/W84F2001/W84F2001",compact('empFollowList','statusList','task','members','roles','projectProp'));
                break;
            case 'selection':
                $all = $request->input();
//                $all = json_encode($all);

                 $oldValue = isset($all['oldValue']) ? $all['oldValue'] : [];
                \Debugbar::info($oldValue);

                $divisionID = session('W76P0000')->DivisionID;
                $sql = '--Do nguon cho nguoi theo doi' . PHP_EOL;
                $sql .= "EXEC W76P9020 '$divisionID', 'EMP'";
                $empFollowList = DB::select($sql);
                foreach ($empFollowList as &$item) {
                    if ($item->Thumnail == "") {
                        $item->Thumnail = asset('media/available.png');
                    } else {
                        $item->Thumnail = 'data:image/jpeg;base64,' . base64_encode($item->Thumnail);
                    }
                }
                return view('modules/W84/W84F2001/components/selection', compact('empFollowList','oldValue'));
                break;
            case 'saveadd':
                $all = $request->input();


                $ProjectID = isset($all["ProjectID"])? $all["ProjectID"]:"";
                $ProjectName = isset($all["ProjectName"])? $all["ProjectName"]:"";
                $EmployeeID = isset($all["EmployeeID"])? $all["EmployeeID"]:"";
                $StatusID = isset($all["StatusID"])? $all["StatusID"]:"";
                $StartDate = Helpers::convertDate($all["StartDate"]);
                $Deadline = Helpers::convertDate($all["Deadline"]);
                $Remark = isset($all["Remark"])? $all["Remark"]:"";
                $Employees = json_decode($all['dataGrid']);;

                $sql ="--Insert ProjectI".PHP_EOL;
                $sql .="Insert Into D76T2300(".PHP_EOL;
                $sql .="ProjectID, ProjectName, EmployeeID, StatusID, ".PHP_EOL;
                $sql .="StartDate, Deadline, Remark, CreateDate, CreateUserID, ".PHP_EOL;
                $sql .="LastModifyDate, LastModifyUserID".PHP_EOL;
                $sql .=") Values(".PHP_EOL;
                $sql .="'$ProjectID',  N'$ProjectName', '$EmployeeID', '$StatusID', ".PHP_EOL;
                $sql .="$StartDate, $Deadline,  N'$Remark', getDate(), '$userID', ".PHP_EOL;
                $sql .="getDate(), '$userID'".PHP_EOL;
                $sql .=")".PHP_EOL;

                foreach ($Employees as $item) {
                    $sql .="--Insert Employees".PHP_EOL;
                    $sql .="Insert Into D76T2302(".PHP_EOL;
                    $sql .="ProjectID, EmployeeID, RoleID, CreateDate, CreateUserID".PHP_EOL;
                    $sql .=") Values(".PHP_EOL;
                    $sql .="'$ProjectID', '$item->EmployeeID', '$item->RoleID', getDate(), '$userID'".PHP_EOL;
                    $sql .=")".PHP_EOL;
                }

                \Debugbar::info($sql);
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
            case 'saveedit':
                $all = $request->input();

                \Debugbar::info($all);
                $ProjectID = isset($all["ProjectID"])? $all["ProjectID"]:"";
                $ProjectName = isset($all["ProjectName"])? $all["ProjectName"]:"";
                $EmployeeID = isset($all["EmployeeID"])? $all["EmployeeID"]:"";
                $StatusID = isset($all["StatusID"])? $all["StatusID"]:"";
                $StartDate = Helpers::convertDate($all["StartDate"]);
                $Deadline = Helpers::convertDate($all["Deadline"]);

                $Remark = isset($all["Remark"])? $all["Remark"]:"";
                $Employees = json_decode($all['dataGrid']);;


                $sql ="--Update ProjectID".PHP_EOL;
                $sql .="Update D76T2300 Set ".PHP_EOL;
                $sql .="ProjectName =  N'$ProjectName',".PHP_EOL;
                $sql .="EmployeeID = '$EmployeeID',".PHP_EOL;
                $sql .="StatusID = '$StatusID',".PHP_EOL;
                $sql .="StartDate = $StartDate,".PHP_EOL;
                $sql .="Deadline = $Deadline,".PHP_EOL;
                $sql .="Remark =  N'$Remark',".PHP_EOL;
                $sql .="LastModifyDate = getDate(),".PHP_EOL;
                $sql .="LastModifyUserID = '$userID'".PHP_EOL;
                $sql .=" Where ProjectID='$ProjectID'".PHP_EOL;

                $sql .="--Delete Employees".PHP_EOL;
                $sql .="Delete From D76T2302";
                $sql .=" Where ProjectID='$ProjectID' ".PHP_EOL;

                foreach ($Employees as $item) {
                    $sql .="--Insert Employees".PHP_EOL;
                    $sql .="Insert Into D76T2302(".PHP_EOL;
                    $sql .="ProjectID, EmployeeID, RoleID, CreateDate, CreateUserID".PHP_EOL;
                    $sql .=") Values(".PHP_EOL;
                    $sql .="'$ProjectID', '$item->EmployeeID', '$item->RoleID', getDate(), '$userID'".PHP_EOL;
                    $sql .=")".PHP_EOL;
                }

                \Debugbar::info($sql);
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


        }


    }

}

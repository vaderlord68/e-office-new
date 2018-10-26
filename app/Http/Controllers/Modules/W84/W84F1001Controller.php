<?php

namespace App\Http\Controllers\Modules\W84;

use App\Http\Controllers\Controller;
use App\Models\D76T2140;
use App\Models\D76T2141;
use App\Models\D76T2280;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class  W84F1001Controller extends Controller
{
    private $d76T2280;

    public function __construct(D76T2280 $d76T2280)
    {
        $this->d76T2280 = $d76T2280;
    }

    public function index(Request $request, $task = '')
    {
        switch ($task) {
//            case'UpdateProcess':
//                return view("modules/W84/W84F1000/UpdateProcess", compact('task'));
//                break;
//            case 'AssignTask':
//
//                return view("modules/W84/W84F1000/AssignTask", compact( 'task'));
//                break;
//            case 'add':
//
//                break;
//            case'save':
//                try {
////                    $taskNameW84F1000 = "";
////                    $employeeW84F1001 = "";
////                    $priorityW84F1001 = "";
////                    $projectIDW84F1001 = "";
////                    $projectStageW84F10011 = "";
////                    $startDateW84F1001 = "";
////                    $deadlineW84F1001 = "";
////                    $empFollowW84F1001 = "";
////                    $descriptionW84F1001 = "";
//                    $TaskID = $request->input('TaskID', '');
//                    $taskNameW84F1000 = \Helpers::sqlstring($request->input('taskNameW84F1000', ''));
//                    $employeeW84F1001 = \Helpers::sqlstring($request->input('employeeW84F1001', ''));
//                    $priorityW84F1001 = \Helpers::sqlstring($request->input('priorityW84F1001', ''));
//                    $projectIDW84F1001 = \Helpers::sqlstring($request->input('projectIDW84F1001', ''));
//                    $projectStageW84F10011 = \Helpers::sqlstring($request->input('projectStageW84F10011', ''));
//                    $startDateW84F1001 = \Helpers::createDateTime($request->input('startDateW84F1001', ''));
//                    $deadlineW84F1001 = \Helpers::createDateTime($request->input('deadlineW84F1001', ''));
//                    $empFollowW84F1001 = \Helpers::createDateTime($request->input('empFollowW84F1001', ''));
//                    $descriptionW84F1001 = \Helpers::createDateTime($request->input('descriptionW84F1001', ''));
//                    $userID = Auth::user()->UserID;
//                    $dateNow = Carbon::now();
//                    //save master
//                    $data = [
////                        [TaskName]
////                        ,[ProjectID]
////                        ,[ProjectStage]
////                        ,[EmployeeID]
////                        ,[EmpFollow]
////                        ,[Priority]
////                        ,[StartDate]
////                        ,[Deadline]
////                        ,[Remark]
////                        ,[CreateDate]
////                        ,[CreateUserID]
////                        ,[LastModifyDate]
////                        ,[LastModifyUserID]
////                        ,[StatusID]
//
//                        "NewsID" => $TaskID,
//                        "TaskName" => $taskNameW84F1000,
//                        "ProjectID" => $projectIDW84F1001,
//                        "ProjectStage" => $projectStageW84F10011,
////                        "EmployeeID" => $employeeW84F1001,
////                        "EmpFollow" => $empFollowW84F1001,
//                        "Priority" => $priorityW84F1001,
//                        "StartDate" => $startDateW84F1001,
//                        "Deadline" => $deadlineW84F1001,
//                        "Remark" => $descriptionW84F1001,
//                        "CreateDate" => $dateNow,
//                        "CreateUserID" => $userID,
//                    ];
//                    $this->d76T2280->insert($data);
//
//                    \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong'));
////                    \Helpers::setSession('lastNewsModified', $newsID);
//                    return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_luu_thanh_cong')]);
//                } catch (\Exception $ex) {
//                    \Helpers::log($ex->getMessage());
//                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
//                }
//                break;
        }
    }
}

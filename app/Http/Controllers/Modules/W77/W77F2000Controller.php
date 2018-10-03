<?php

namespace App\Http\Controllers\Modules\W77;

use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Models\D76T0000;
use App\Models\D76T2200;
use App\Models\D76T2230;
use App\Models\D76T2261;
use App\Models\D76T9000;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class  W77F2000Controller extends Controller
{
    private $d76T2261;

    /**
     * @param string $task
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function __construct(D76T2261 $d76T2261)
    {
        $this->d76T2261 = $d76T2261;
    }

    public function index($task = "")
    {
        switch ($task) {
            case'':
                $userID = Auth::user()->UserID;
                $divisionID = session('W76P0000')->DivisionID;
                $orgUnitID = session('W76P0000')->OrgUnitID;

                $sql = '--Do nguon cho combo don vi' . PHP_EOL;
                $sql .= "EXEC D76P9000 '$userID', '$orgUnitID','$divisionID'";
                $divisionIDList = DB::select($sql);
                $divisionIDList = json_encode($divisionIDList);

                $carDList = $this->d76T2261->select('CarNo as id', 'CarBranch as title')->orderBy('DisplayOrder', 'desc')->get();
                $carDList = json_encode($carDList);
                //\Debugbar::info($carDList);

                $newsCollection = $this->getCalender();
                $newsCollection = ($newsCollection);
                //\Debugbar::info($newsCollection);

                break;
            case'loadCalender':
                $newsCollection = $this->getCalender();
                //\Debugbar::info($newsCollection);
                return $newsCollection();
                break;
        }
        return view("modules/W77/W77F2000/W77F2000", compact('carDList', 'newsCollection', 'divisionIDList', 'task'));
    }

    private function getCalender()
    {
        $userID = Auth::user()->UserID;
        $divisionID = session('W76P0000')->DivisionID;
        $orgUnitID = session('W76P0000')->OrgUnitID;
        $sql = '--Do nguon cho luoi' . PHP_EOL;
        $sql .= "EXEC W77P2000'$userID', '$orgUnitID','$divisionID'";
        $collection = DB::select($sql);
        foreach ($collection as $row) {
            $row->resourceId = $row->CarNo;
            $row->title = $row->Description;
            $RequestedDateFrom = $row->RequestedDateFrom;
            $RequestedDateTo = $row->RequestedDateTo;
            $row->start = str_replace(' ', 'T', $RequestedDateFrom);
            $row->end = str_replace(' ', 'T', $RequestedDateTo);
        }

        return json_encode($collection);
    }

}

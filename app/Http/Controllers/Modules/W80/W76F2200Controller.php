<?php

namespace App\Http\Controllers\Modules\W80;

use App\Http\Controllers\Controller;
use App\Models\D76T2200;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class  W76F2200Controller extends Controller
{
    private $d76T2200;

    public function __construct(D76T2200 $d76T2200)
    {
        $this->d76T2200 = $d76T2200;
        $this->newsHelper = new \App\Module\News\Helper();
    }
    public function index(Request $request, $task = "")
    {
        $permission = Helpers::getPermission('W76F2200');

        switch ($task) {
            case '':
                $newsCollection = $this->getFilterList('');

                return view("modules/W80/W76F2200/W76F2200", compact('rsData','newsCollection','permission'));
                break;
            case 'filter':
                $txtFacilityNameW76F2201 = $request->input("txtSearchValueW76F2200",'');
                $filterCollection = $this->getFilterList($txtFacilityNameW76F2201);
                return $filterCollection;
                break;
            case "delete":
                try {
                    $facilityID = $request->input('facilityID', '');
                    if ($this->delete($facilityID)) {
                        \Helpers::setSession('successMessage', \Helpers::getRS('Du_lieu_da_duoc_xoa_thanh_cong'));
                        return json_encode(['status' => 'SUCC', 'message' => \Helpers::getRS('Du_lieu_da_duoc_xoa_thanh_cong')]);
                    } else {
                        return json_encode(array('status' => 'ERROR', 'message' => \Helpers::getRS("Co_loi_xay_ra_trong_qua_trinh_xoa_du_lieu")));
                    }
                } catch (\Exception $ex) {
                    \Helpers::log($ex->getMessage());
                    return json_encode(['status' => 'ERROR', 'message' => $ex->getMessage()]);
                }
                break;
        }
    }

    public function getFilterList($txtFacilityNameW76F2201)
    {
        $userID = Auth::user()->UserID;
        $sql = '--Do nguon cho luoi'.PHP_EOL;
        $sql .= "EXEC W76P2200 '$userID', '$txtFacilityNameW76F2201'";
        $collection = DB::select($sql);
        \Debugbar::info($collection);
        return json_encode($collection) ;
    }

    public function delete($facilityID)
    {
        $result = $this->d76T2200->where('FacilityID', "=", $facilityID)->delete();
        return $result;
    }
}

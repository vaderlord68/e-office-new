<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class D76T9000 extends \Eloquent
{
    /**
     * Table name = D76T2140
     * Table description: Module News: Entity News
     */
    protected $table = 'D76T9000';
    protected $primaryKey = 'ID';
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    public function getList($orgunitID)
    {
        $result = DB::table($this->table)->where('OrgunitID', $orgunitID)
            ->get();
        return $result;
    }

}
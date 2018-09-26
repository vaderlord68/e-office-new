<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class D76T1556 extends \Eloquent
{
    /**
     * Table name = D76T2140
     * Table description: Module News: Entity News
     */
    protected $table = 'D76T1556';
    protected $primaryKey = 'ID';
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    public function getList($listTypeID)
    {
        $result = DB::table($this->table)->where('ListTypeID', $listTypeID)
            ->get();
        return $result;
    }

}
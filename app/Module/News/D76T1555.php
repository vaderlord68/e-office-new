<?php

namespace App\Module\News;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class D76T1555 extends \Eloquent
{
    /**
     * Table name = D76T1555
     * Table description: Module News: Entity News
     */

    protected $table = 'D76T1555';
    protected $primaryKey = 'ListTypeID';
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    public function getList()
    {
        $result = DB::table($this->table)->get();
        return $result;
    }

}
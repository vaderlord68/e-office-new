<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class D76T2004 extends Model
{
    /**
     * Table name = D76T2000
     * Table description: Entity Document
     */
    protected $table = 'D76T2004';
    protected $primaryKey = 'ID';
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    public function getCollection()
    {
        $collection = DB::table($this->table)
            ->get();
        return $collection;
    }


}
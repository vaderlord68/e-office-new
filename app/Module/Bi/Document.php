<?php

namespace App\Module\Bi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Document extends Model
{
    /**
     * Table name = D76T2000
     * Table description: Entity Document
     */
    protected $table = 'D76T2000';
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
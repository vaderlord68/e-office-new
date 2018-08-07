<?php

namespace App\Module\Bi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FolderPermission extends Model
{
    /**
     * Table name = D76T2003
     * Table description: Entity FolderPermission
     */
    protected $table = 'D76T2003';
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
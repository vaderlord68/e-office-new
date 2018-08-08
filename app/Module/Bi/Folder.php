<?php

namespace App\Module\Bi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Folder extends Model
{
    /**
     * Table name = D76T1010
     * Table description: Entity Folder
     */
    protected $table = 'D76T1010';
    protected $primaryKey = 'ID';
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    protected $helper;

    public function __construct(
        array $attributes = []
    )
    {
        parent::__construct($attributes);
    }

    public function getFolderId()
    {
        return $this->ID;
    }

    public function getCollection()
    {
        $collection = DB::table($this->table)
            ->get();
        return $collection;
    }

    public function getAllChildFolder($folderParentId)
    {
        $collection = DB::table($this->table)
            ->where("FolderParentId","=", $folderParentId)
            ->get();
        return $collection;
    }

}
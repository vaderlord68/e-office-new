<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RelatedDocument extends Model
{
    /**
     * Table name = D76T2001
     * Table description: Entity RelatedDocument
     */
    protected $table = 'D76T2001';
    protected $primaryKey = 'ID';
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    public function getCollection()
    {
        $collection = DB::table($this->table)
            ->get();
        return $collection;
    }
    public function getRelatedDocWithDocId($DocID)
    {
        $collection = DB::table($this->table)
            ->where("DocID","=",$DocID)
            ->get();
        return $collection;
    }

    public function deleteRelationByDocumentID($DocID)
    {
        DB::table($this->table)
            ->where("DocID","=",$DocID)
            ->delete();
    }

}
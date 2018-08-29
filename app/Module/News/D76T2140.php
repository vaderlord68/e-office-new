<?php

namespace App\Module\News;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class D76T2140 extends \Eloquent
{
    /**
     * Table name = D76T2140
     * Table description: Module News: Entity News
     */
    protected $table = 'D76T2140';
    protected $primaryKey = 'NewsID';
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    public $incrementing = false;

//    public function insert($attributes){
//        return DB::table($this->table)->insert($attributes);
//    }

//    public function update($attributes){
//        return DB::table($this->table)->update($attributes);
//    }

    public function getCollection()
    {
        $collection = DB::table($this->table)->where('Deleted', 0)->orderByDesc('LastModifyDate')
            ->select("*", DB::raw("0 as IsSelected"))
            ->get();
        return $collection;
    }

//    public function find($channelID)
//    {
//        $collection = DB::table($this->table)->where('Deleted', 0)->where('ChannelID', '=',$channelID)->orderByDesc('LastModifyDate')
//            ->select("*", DB::raw("0 as IsSelected"))
//            ->get();
//
//        return $collection;
//    }

    public function getNewsByRelativeTitle($title)
    {
        $collection = DB::table($this->table)
            ->where("Title","LIKE","%$title%")
            ->get();
        return $collection;
    }

}
<?php

namespace App\Module\BookingRoom;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class D76T2230 extends \Eloquent
{
    /**
     * Table name = D76T2140
     * Table description: Module News: Entity News
     */
    protected $table = 'D76T2230';
    protected $primaryKey = 'FacilityID';
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    public $incrementing = false;

    public function getCollection()
    {
        $collection = DB::table($this->table)->where('Deleted', 0)->orderByDesc('LastModifyDate')
            ->select("*", DB::raw("0 as IsSelected"))
            ->get();
        return $collection;
    }




}
<?php

namespace App\Module\W76;

use Illuminate\Support\Facades\DB;
class D76T2000 extends \Eloquent
{
    protected $table = 'D76T2000';
    protected $primaryKey = 'ID';
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    public $incrementing = false;
}
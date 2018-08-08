<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    /**
     * Table name = D00T0030
     * Table description: Entity Folder
     */
    protected $table = 'D00T0030';
    protected $primaryKey = 'UserID';
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    protected $helper;
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function getCollection()
    {
        $collection = DB::table($this->table)
            ->get();
        return $collection;
    }



    public function authenticate($userData)
    {
        $userNname = $userData['UserName'];
        $user = Users::where("UserName",$userNname)->first();
            if (
                ($userData['UserName'] == $user->UserName) &&
                ($userData['UserPassword'] == $user->UserPassword)
            ) {
                    return true;
            }
        return false;

    }
}

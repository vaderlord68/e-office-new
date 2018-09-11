<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class User extends Authenticatable
{
    use Notifiable;
    protected $connection = 'sqlsrv';
    protected $table = 'D00T0030';
    protected $primaryKey = "UserID";
    public $timestamps = false;
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'UserID', 'UserPassword'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = array('UserPassword', 'LogonToken');

    public function Avatar()
    {
        if (Schema::hasTable('D09T0300'))
            return $this->hasOne('D09T0300', 'EmployeeID', 'HREmployeeID')->first();
        else
            return ["EmployeePicture" => ""];
    }


    //Get encrypted password
    public function getAuthPassword()
    {
        return $this->UserPassword;
    }

    //override token
    public function getRememberToken()
    {
        return $this->LogonToken;
    }

    public function setRememberToken($value)
    {
        $this->LogonToken = $value;
    }

    public function getRememberTokenName()
    {
        return 'LogonToken';
    }

    public function authenticate($userData)
    {
        $username = $userData['UserName'];
        $remember = $userData['remember'];
        $user = User::where("UserID", $username)->first();
        if ($user != null && $userData['UserName'] == $user->UserID && $userData['UserPassword'] == $user->UserPassword) {
            Auth::login($user, $remember);
            return true;
        }
        return false;

    }

    public function getAllUsers() {
        $users = DB::table($this->table)
            ->select('UserID', 'UserNameU as UserName', 'Email')
            ->get();
        return $users;
    }
}

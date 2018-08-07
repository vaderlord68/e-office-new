<?php
namespace App\Eoffice;
class Helper extends \Illuminate\Database\Eloquent\Model
{
    public static function setSessionUser($user)
    {
        self::setSession('current_user', $user);
    }

    public static function setSession($key, $value)
    {
        session([$key => $value]);
    }

    public static function removeSessionByKey($key)
    {
        session()->remove($key);
    }

    public static function getSession($key)
    {
        return session($key);
    }

    public static function isAUserInSession()
    {
        if (self::getSession('current_user')) {
            return true;
        }
        return false;
    }
}
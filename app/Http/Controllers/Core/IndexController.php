<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\CoreHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class  IndexController extends Controller
{

    protected $coreHelper;
    public function __construct()
    {
        $this->coreHelper = new CoreHelpers();
    }

    public function index()
    {
        if ($this->isAUserInSession()) {
            return view('system/landing');
        } else {
            return view('user/login');
        }
    }

    public function setSessionUser($user)
    {
        $this->setSession('current_user', $user);
    }

    public function setSession($key, $value)
    {
        session([$key => $value]);
    }

    public function removeSessionByKey($key)
    {
        session()->remove($key);
    }

    public function getSession($key)
    {
        return session($key);
    }

    public function isAUserInSession()
    {
        if ($this->getSession('current_user')) {
            return true;
        }
        return false;
    }
}

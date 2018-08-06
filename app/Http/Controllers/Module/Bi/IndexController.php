<?php

namespace App\Http\Controllers\Module\Bi;

use App\CoreHelpers;
use App\Http\Controllers\Controller;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class  IndexController extends Controller
{

    protected $coreHelper;
    protected $sidebarMenus = [
        [
            'label' => 'Feature 1',
            'url'   => '#'
        ],
        [
            'label' => 'Feature 2',
            'url'   => '#'
        ],
        [
            'label' => 'Feature 3',
            'url'   => '#'
        ]
    ];
    public function __construct()
    {
        $this->coreHelper = new CoreHelpers();
    }

    public function index()
    {
        if ($this->isAUserInSession()) {
            $this->setSession("currentModuleMenus",$this->sidebarMenus);
            return view('system/module/bi');
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

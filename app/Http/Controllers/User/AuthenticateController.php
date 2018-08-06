<?php

namespace App\Http\Controllers\User;

use App\CoreHelpers;
use App\Http\Controllers\Controller;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class  AuthenticateController extends Controller
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

    public function loginPost(Request $request)
    {
        $dataPost = $request->input();
        try {
            $username = $dataPost['user_account'];
            $password = $this->coreHelper->encrypt_userpass($dataPost['user_password']);
            $userData = [
                'user_account' => $username,
                'user_password' => $password
            ];
            $success = $this->accountAuthenticate($userData);
            if ($success) {
                $this->setSession('current_user',$userData['user_account']);
                $this->setSession('successMessage',"Đăng nhập thành công");
            } else {
                $this->setSession('errorMessage',"Thông tin đăng nhập không chính xác");
            }
            return redirect('/');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function accountAuthenticate($data)
    {
        $user = new Users();
        $isAuthenticated = $user->authenticate($data);
        return $isAuthenticated;
    }

    public function logoutPost()
    {
        $this->removeSessionByKey('current_user');
        $this->setSession('successMessage',"Đăng xuất thành công");
        return redirect('/');
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

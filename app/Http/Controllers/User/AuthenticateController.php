<?php

namespace App\Http\Controllers\User;

use App\CoreHelpers;
use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\Users;
use Illuminate\Http\Request;

class  AuthenticateController extends Controller
{

    protected $coreHelper;
    public function __construct()
    {
        $this->coreHelper = new CoreHelpers();
    }

    public function index()
    {
        if (Helper::isAUserInSession()) {
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
                Helper::setSession('current_user',$userData['user_account']);
                Helper::setSession('successMessage',"Đăng nhập thành công");
            } else {
                Helper::setSession('errorMessage',"Thông tin đăng nhập không chính xác");
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
        Helper::removeSessionByKey('current_user');
        Helper::setSession('successMessage',"Đăng xuất thành công");
        return redirect('/');
    }
}

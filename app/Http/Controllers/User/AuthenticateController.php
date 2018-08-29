<?php

namespace App\Http\Controllers\User;

use App\CoreHelpers;
use App\Eoffice\Helper;
use App\Http\Controllers\Controller;
use App\User;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class  AuthenticateController extends Controller
{

    protected $coreHelper;
    public function __construct()
    {
        $this->coreHelper = new CoreHelpers();
    }

    public function index()
    {
        if (Auth::check() || Auth::viaRemember()) return Redirect::to("/");
        return view('user/login');
    }

    public function loginPost(Request $request)
    {
        $dataPost = $request->input();
        try {
            $username = $dataPost['UserName'];
            $password = $this->coreHelper->encrypt_userpass($dataPost['UserPassword']);
            $remember = Input::get("remember") == 'on' ? true : false;
            $userData = [
                'UserName' => $username,
                'UserPassword' => $password,
                'remember'=>$remember
            ];
            $success = $this->accountAuthenticate($userData);
            if ($success) {
                Helper::setSession('current_user',$userData['UserName']);
                Helper::setSession('successMessage',"Đăng nhập thành công");
            } else {
                Helper::setSession('errorMessage',"Thông tin đăng nhập không chính xác");
            }
            return redirect()->intended();
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function accountAuthenticate($data)
    {
        $user = new User();
        $isAuthenticated = $user->authenticate($data);
        return $isAuthenticated;
    }

    public function logoutPost()
    {
        Helper::removeSessionByKey('current_user');
        Helper::setSession('successMessage',"Đăng xuất thành công");
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\UserGroup;
use Auth;
use Session;
use App;
class AuthController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect()->route('getIndexAdmin');
        }else{
            return view('admin.pages.account.login');
        }
    }
    public function postLogin(Request $request)
   	{
   		$data = [
            'username' => $request->txtUsername,
            'password' => $request->txtPassword,
            'isAdmin' => 'true',
        ];
    	if(Auth::attempt($data)){
            $notification = array(
                'message' => 'Login Successfully', 
                'alert-type' => 'success',
            );
    		return redirect()->route('getIndexAdmin')->with($notification);
    	}
    	else{
    		return redirect()->back()->with('success','Đăng Nhập Thất Bại!');;
    	}
    }
    public function getLogout() {
       Auth::logout();
       Session::flush();
       return redirect()->route('getLoginAdmin');
    }
}

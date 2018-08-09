<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\UserGroup;
use Auth;
use Session;
use App;
class AccountController extends Controller
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
    public function getListUserGroup()
    {
        $group = UserGroup::where('langCode', App::getLocale('locale'))->get();
        return view('admin.pages.account.userGroup',['group'=>$group]);
    }
    public function postAddUserGroup(Request $request)
    {
        $group = new UserGroup();
        $group->name = $request->txtName;
        $group->langCode = App::getLocale();
        $group->note = $request->note;
        $group->save();
        return redirect()->back()->with('success', __("notify.addNewSuccessfully"));
    }
    public function getListUsers()
    {
        $users = User::all();
        $group = UserGroup::all();
        return view('admin.pages.account.users',['users'=>$users, 'group'=>$group]);
    }
    public function postAddUser(Request $request)
    {
        $user = new User();
        $user->name = $request->txtUsername; 
        $user->email = $request->txtEmail; 
        $user->username = $request->txtUsername; 
        $user->password = bcrypt($request->txtPassword); 
        $user->phone = $request->txtPhone; 
        $user->group_id = $request->sltGroup;
        $user->avatar = $request->avatar;
        $user->isAdmin = 'true';
        $user->save();
        $notification = array(
                'message' => __("notify.addNewSuccessfully",['attribute'=>__("general.user")]), 
                'alert-type' => 'success',
            );
        return redirect()->back()->with($notification);

    }
    public function postEditUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->txtUsername; 
        $user->email = $request->txtEmail; 
        $user->username = $request->txtUsername; 
        $user->password = bcrypt($request->txtPassword); 
        $user->phone = $request->txtPhone; 
        $user->group_id = $request->sltGroup;
        $user->avatar = $request->avatar;
        $user->isAdmin = 'true';
        $user->birthday = strtotime($request->birthday);
        $user->address = $request->txtAddress;
        $user->cmnd = $request->txtCMND;
        $user->gender = $request->gender;
        $user->note = $request->note;
        $user->save();
        $notification = array(
                'message' => __("notify.updateSuccessfully",['attribute'=>__("general.user")]), 
                'alert-type' => 'success',
            );
        return redirect()->back()->with($notification);

    }
    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        $notification = array(
                'message' => __("notify.deleteSuccessfully",['attribute'=>__("general.user")]), 
                'alert-type' => 'success',
            );
        return redirect()->back()->with($notification);
    }
}

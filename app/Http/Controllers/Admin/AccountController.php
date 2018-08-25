<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\UserGroup;
use Auth;
use Session;
use App;

use Spatie\Permission\Models\Role;
use DB;
use Hash;
class AccountController extends Controller
{
    function __construct()
    {
         // $this->middleware('permission:user-view');
         // $this->middleware('permission:user-add', ['only' => ['postAddUser']]);
         // $this->middleware('permission:user-update', ['only' => ['destroy']]);
         // $this->middleware('permission:user-delete', ['only' => ['deleteUser']]);
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
        // $roles = Role::pluck('name','name')->all();
        $roles = Role::all();
        return view('admin.pages.account.users',['users'=>$users, 'group'=>$group, 'roles'=>$roles]);
    }
    public function postAddUser(Request $request)
    {
        $user = new User();
        $user->name = $request->txtUsername; 
        $user->email = $request->txtEmail; 
        $user->username = $request->txtUsername; 
        $user->passwordValue =  $request->txtPassword;
        $user->password = bcrypt($request->txtPassword); 
        $user->phone = $request->txtPhone; 
        $user->group_id = $request->sltGroup;
        $user->avatar = $request->avatar;
        $user->isAdmin = 'true';
        $user->save();
        $user->assignRole($request->input('roles'));
        $notification = array(
                'message' => __("notify.addNewSuccessfully",['attribute'=>__("general.user")]), 
                'alert-type' => 'success',
            );
        return redirect()->back()->with($notification);

    }
    public function getEditUser(Request $request, $id)
    {
        $user = User::find($id);
        $group = UserGroup::all();
        // $roles = Role::pluck('name','name')->all();
        $roles = Role::all();
        $userRole = $user->roles;
        return view('admin.pages.account.editUser', ['user'=>$user,'group'=>$group,'roles'=>$roles,'userRole'=>$userRole]);
    }
    public function postEditUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->txtUsername; 
        $user->email = $request->txtEmail; 
        $user->username = $request->txtUsername;
        $user->passwordValue =  $request->txtPassword;
        $user->password = bcrypt($request->txtPassword);
        $user->phone = $request->txtPhone; 
        if(Auth::user()->group_id!=$request->sltGroup)
        {
            $notification = array(
                'message' => __("notify.updateGroupUserError"), 
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
        else
        {
            $user->group_id = $request->sltGroup;
        }   
        
        $user->avatar = $request->avatar;
        $user->isAdmin = 'true';
        $user->birthday = strtotime($request->birthday);
        $user->address = $request->txtAddress;
        $user->cmnd = $request->txtCMND;
        $user->gender = $request->gender;
        if(Auth::user()->status!=$request->status)
        {
            $notification = array(
                'message' => __("notify.updateStatusUserError",['attribute'=>__("general.user")]), 
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
        else
        {
            $user->status = $request->status;
        }
        $user->note = $request->note;
        $user->save();
        DB::table('model_has_roles')->where('model_id',$id)->delete();


        $user->assignRole($request->input('roles'));
        $notification = array(
                'message' => __("notify.updateSuccessfully",['attribute'=>__("general.user")]), 
                'alert-type' => 'success',
            );
        return redirect()->route('getListUsers')->with($notification);

    }
    public function deleteUser($id)
    {
        $user = User::find($id);
        if($user->id==Auth::user()->id)
        {
            $notification = array(
                'message' => __("notify.deleteUserError"), 
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
        else
        {
            $user->delete();
            $notification = array(
                    'message' => __("notify.deleteSuccessfully",['attribute'=>__("general.user")]), 
                    'alert-type' => 'success',
                );
            return redirect()->back()->with($notification);
        }
    }
}

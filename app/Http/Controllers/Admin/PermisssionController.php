<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class PermisssionController extends Controller
{
    public function getList()
    {
    	$roles = Role::all();
    	$permission = Permission::all();
    	return view('admin.pages.permission.list',['roles'=>$roles,'permission'=>$permission]);
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);


        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));


        return redirect()->back()
                        ->with('success','Role created successfully');
    }
}

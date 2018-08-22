<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Language;
class LanguageController extends Controller
{
    function __construct()
    {
         // $this->middleware('permission:language-get-list', ['only' => ['getList']]);
         // $this->middleware('permission:language-post-add', ['only' => ['postAdd']]);
         // $this->middleware('permission:language-post-edit', ['only' => ['postEdit']]);
         // $this->middleware('permission:language-delete', ['only' => ['delete']]);
    }
    public function getList()
    {
    	$languages = Language::all();
    	return view('admin.pages.language.index', ['languages'=>$languages]);
    }
    public function postAdd(Request $request)
    {
    	$language = new Language();
    	$language->name = $request->txtName;
    	$language->code = $request->txtCode;
    	$language->image = $request->image;
    	$language->save();
    	return redirect()->back()->with('success', '__("notify.addNewSuccessfully")');
    }
    public function postEdit(Request $request, $id)
    {
    	$language = Language::find($id);
    	$language->name = $request->txtName;
    	$language->code = $request->txtCode;
    	$language->image = $request->image;
    	$language->status = $request->status;
    	$language->save();
    	return redirect()->back()->with('success', '__("notify.updateSuccessfully")');
    }
    public function delete($id)
    {
        $language = Language::find($id);
        $language->delete();
        $notification = array(
            'message' => __("notify.deleteSuccessfully",['attribute'=>__("general.language")]), 
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Nation\District;
use App\Model\Nation\Province;
use App\Model\Nation\Ward;
class AccountController extends Controller
{
    public function getRegister()
    {
    	$province = Province::all();
    	$district = District::all();
    	$ward = Ward::all();
    	return view('frontend.pages.account.register',['province'=>$province,'district'=>$district,'ward'=>$ward]);
    }
}

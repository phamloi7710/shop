<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Nation\District;
use App\Model\Nation\Province;
use App\Model\Nation\Ward;
class AjaxController extends Controller
{
    public function getDistrict($province_id)
    {
    	$district = District::where('matp',$province_id)->get();
    	foreach($district as $dis)
    	{
    		echo "<option value='".$dis->maqh."'>".$dis->name."</option>";
    	}
    }
 	public function getWard($district_id)
    {
    	$ward = Ward::where('maqh',$district_id)->get();
    	foreach($ward as $wa)
    	{
    		echo "<option value='".$wa->xaid."'>".$wa->name."</option>";
    	}
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use Illuminate\Support\Facades\Redirect;
use App;

class LanguageController extends Controller
{
    public function index()
    {


        if(!Session::has('locale'))
        {
            Session::put('locale', Input::get('locale'));
        }else{
            Session::put('locale', Input::get('locale'));
        }
        return Redirect::back();

    }

    public function locale($locale)
    {

        Session::put('locale', $locale);
        App::setLocale($locale);
       // exit($locale);

        return Redirect::back();
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use DB;
use Lang;
use App\Model\Language;
use App;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $getLocale = App::getLocale();
        if(Schema::hasTable('languages')) {
            $languages = Language::where('status', true)->get();
            View::composer('admin.general.top-nav', function ($view) use ($languages,$getLocale) {
                $view->with(['languages'=>$languages,'getLocale'=>$getLocale]);
            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

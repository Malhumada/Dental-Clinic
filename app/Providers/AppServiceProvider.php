<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;
 
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

         if (Schema::hasTable('Settings')) {
            $location =  DB::table('Settings')->where('set_value','location')->get();
            $open_hours =  DB::table('Settings')->where('set_value','open_hours')->get();
            $mobile =  DB::table('Settings')->where('set_value','mobile')->get();

            $slider =  DB::table('Settings')->where('set_name','slider')->get();

            $Testimo =  DB::table('Settings')->where('set_name','Testimo')->get();

            $Services =  DB::table('Settings')->where('set_name','Services')->get();


            

            view()->share('location', $location);
            view()->share('open_hours', $open_hours);
            view()->share('mobile', $mobile);

            view()->share('slider', $slider);
            
            view()->share('Testimo', $Testimo);

            view()->share('Services', $Services);
        } 

    }
}

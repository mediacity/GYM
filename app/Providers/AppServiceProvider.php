<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Settings;

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
         view()->composer('*',function($view){

          if(\DB::connection()->getDatabaseName()){

                $setting = Settings::first();

                $view->with(['setting' => $setting]);

          }

        });
    }
}

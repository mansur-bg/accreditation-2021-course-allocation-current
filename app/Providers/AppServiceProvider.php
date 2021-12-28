<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\View;
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
        $registration_data_date = (new Carbon('2021-12-22 07:26:01'))->format('l, jS \\of F, Y @ H:i:s');
        View::share('registration_data_date',$registration_data_date);
    }
}

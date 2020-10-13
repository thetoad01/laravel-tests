<?php

namespace App\Providers;

use App\Models\NhtsaDecoded;
use App\Observers\NhtsaDecodeObserver;
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
        NhtsaDecoded::observe(NhtsaDecodeObserver::class);
    }
}

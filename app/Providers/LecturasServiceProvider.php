<?php

namespace App\Providers;
use App\Models\lecturaPatentes;
use App\Observers\LecturasObserver;

use Illuminate\Support\ServiceProvider;

class LecturasServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Mark::observe(LecturasObserver::class);
    }
}

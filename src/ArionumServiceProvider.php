<?php

namespace pxgamer\ArionumLaravel;

use Illuminate\Support\ServiceProvider;
use pxgamer\Arionum\Arionum;

/**
 * Class ArionumServiceProvider
 */
class ArionumServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/arionum.php' => config_path('arionum.php'),
        ], 'arionum.config');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/arionum.php', 'arionum');

        $this->app->singleton('arionum', function () {
            return new Arionum(config('arionum.node_uri'));
        });
    }
}

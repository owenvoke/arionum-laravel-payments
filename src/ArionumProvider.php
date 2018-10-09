<?php

namespace pxgamer\ArionumLaravel;

use Illuminate\Support\ServiceProvider;

/**
 * Class ArionumProvider
 */
class ArionumProvider extends ServiceProvider
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
        //
    }
}

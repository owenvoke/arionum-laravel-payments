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
     * The Arionum configuration path.
     */
    private const PACKAGE_CONFIG_FILE = __DIR__.'/../config/arionum.php';

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            self::PACKAGE_CONFIG_FILE => config_path('arionum.php'),
        ], 'arionum.config');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(self::PACKAGE_CONFIG_FILE, 'arionum');

        $this->registerArionum();
    }

    /**
     * Register the Arionum singleton.
     */
    public function registerArionum(): void
    {
        $this->app->singleton('arionum', function () {
            return new Arionum(config('arionum.node_uri'));
        });
    }
}

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

        $this->mergeConfigFrom(self::PACKAGE_CONFIG_FILE, 'arionum');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerArionumSingletons();

        $this->registerArionumPayment();
    }

    /**
     * Register Arionum singletons.
     */
    private function registerArionumSingletons(): void
    {
        $this->app->singleton('arionum', function ($app) {
            return new Arionum($app['config']->get('arionum.node_uri'));
        });
    }

    /**
     * Register Arionum
     */
    private function registerArionumPayment()
    {
        $this->app->bind('ArionumPayment', function () {
            return $this->resolveArionumPayment();
        });
    }

    /**
     * @return mixed
     */
    private function resolveArionumPayment()
    {
        // ...
        return;
    }
}

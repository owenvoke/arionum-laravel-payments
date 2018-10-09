<?php

namespace pxgamer\ArionumLaravel;

use Orchestra\Testbench\TestCase as OrchestraTestCase;

/**
 * Class TestCase
 */
class TestCase extends OrchestraTestCase
{
    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [ArionumServiceProvider::class];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Arionum' => Facades\Arionum::class,
        ];
    }
}

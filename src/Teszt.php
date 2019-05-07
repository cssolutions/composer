<?php
/**
 * Created by PhpStorm.
 * User: csaba
 * Date: 2019.05.06.
 * Time: 17:16
 */

namespace Teszt;


class Teszt
{

    /**
     * Bootstrap the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $config     = __DIR__ . '/../config/digi-query-logger.php';

        $this->publishes([
            $config     => base_path('config/digi-query-logger.php'),
        ], 'digi-query-logger');

        $this->mergeConfigFrom($config, 'digi-query-logger');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('QueryLogger', function() {
            $test = new \stdClass();
            $test->getName = function($name) {
                echo $name;
            };
            return $test;
        });
    }
}
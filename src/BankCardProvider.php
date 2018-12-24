<?php

namespace LazyBench\BankCard;

/**
 * Author:LazyBench
 * Date:2018/12/21
 */

use Illuminate\Support\ServiceProvider;
use LazyBench\BankCard\Element\Element;
use LazyBench\BankCard\Driver\Ali;

class BankCardProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (function_exists('config_path')) {
            $this->publishes([
                __DIR__.'/Config/config.php' => config_path('bankcard.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('bankCard', function () {
            $driver = config('bankcard.driver');
            $service = $driver ? app($driver) : new Ali();
            return new Element($service);
        });
    }

    public function providers()
    {
        return ['bankCard'];
    }
}
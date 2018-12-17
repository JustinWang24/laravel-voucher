<?php

namespace SmartBro\Voucher;

use Illuminate\Support\ServiceProvider;
use SmartBro\Voucher\services\RedeemerService;
use SmartBro\Voucher\services\VoucherService;

class VoucherServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/voucher.php' => config_path('voucher.php'),
        ], 'voucher');

        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }

    /**
     * Register services.
     * @return void
     */
    public function register()
    {
        //
//        dump('voucher register');
        $this->mergeConfigFrom( __DIR__.'/../config/voucher.php', 'voucher');

        $this->app->singleton('voucher',function($app){
            return new VoucherService();
        });

        $this->app->singleton('redeemer',function($app){
            return new RedeemerService();
        });
    }

    public function provides()
    {
        return ['voucher','redeemer'];
    }
}

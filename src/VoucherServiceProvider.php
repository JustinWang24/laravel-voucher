<?php

namespace SmartBro\Voucher;

use Illuminate\Support\ServiceProvider;
use SmartBro\Voucher\services\RedeemerService;
use SmartBro\Voucher\services\VoucherService;

class VoucherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     * @return void
     */
    public function register()
    {
        //
        $this->mergeConfigFrom( __DIR__.'/config/voucher.php', 'voucher');

        $this->app->singleton('voucher',function($app){
            return new VoucherService();
        });

        $this->app->singleton('redeemer',function($app){
            return new RedeemerService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/voucher.php' => config_path('voucher.php'),
        ], 'config');

        /**
         * 把Migration的文件发布到系统的migration目录中
         */
        $timestamp = date('Y_m_d_His', time());
        $this->publishes([
            __DIR__.'/migrations/2018_12_17_040008_create_vouchers_table.php' => database_path('migrations/'.$timestamp.'_create_vouchers_table.php'),
        ], 'migrations');
    }

    public function provides()
    {
        return ['voucher','redeemer'];
    }
}

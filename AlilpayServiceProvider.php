<?php

namespace App\Providers;
use aliLogin\AliLogin;
use aliLogin\AliLoginService;
use Illuminate\Support\ServiceProvider;

class AlilpayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        //使用bind绑定实例到接口以便依赖注入
        $this->app->bind(AliLogin::class,function(){
            return new AliLoginService;
        });

//        //使用bind绑定单例
//        $this->app->singleton('App\Contracts\Hzj',function(){
//
//            return new TestService();
//        });
    }
}

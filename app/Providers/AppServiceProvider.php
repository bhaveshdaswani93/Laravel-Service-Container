<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Contracts\ExampleContract;
use App\Services\NormalDependency;
use App\Services\ViaInterfaceDependency;
use App\Services\SingleTonDependency;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NormalDependency::class,function($app){
            return new NormalDependency();
        });

        $this->app->singleton(SingleTonDependency::class,function($app){
           return new SingleTonDependency();
        });

        $this->app->bind(ExampleContract::class,function($app){
           return new ViaInterfaceDependency();
        });


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

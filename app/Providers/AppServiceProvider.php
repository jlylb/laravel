<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Faker\Factory as FakerFactory;
use Faker\Generator as FakerGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->make(FakerGenerator::class,function(){
        //     return FakerFactory::create('zh_CN');
        // });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Collective\Html\FormFacade as Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('bsText', 'components.form.text', ['name', 'type'=>'text', 'value', 'attributes']);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

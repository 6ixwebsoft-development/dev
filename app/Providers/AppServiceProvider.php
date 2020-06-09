<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
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
    protected function prepareForValidation() 
    {
       //Here email we are reciving as comma seperated so we make it array
       $this->merge(['emails' => explode(',', rtrim($this->email, ','))]);
    }
}

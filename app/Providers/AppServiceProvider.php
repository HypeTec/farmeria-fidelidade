<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Usuario;
use App\Observers\UsuarioObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Usuario::observe(UsuarioObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

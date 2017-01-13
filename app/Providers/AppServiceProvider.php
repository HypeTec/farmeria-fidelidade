<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Usuario;
use App\Point;
use App\Observers\UsuarioObserver;
use App\Observers\PontoObserver;


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
        Point::observe(PontoObserver::class);

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

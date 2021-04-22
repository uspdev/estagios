<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;

use App\Models\Parecerista;
use Uspdev\Replicado\Pessoa;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        // força https na produção
        if (\App::environment('production')) {
            \URL::forceScheme('https');
        }

        # Variáveis globais do sistema
        if(!empty(config('app.key'))) {
            view()->share('presidente', Pessoa::nomeCompleto(Parecerista::presidente()->numero_usp));
        }
    }
}

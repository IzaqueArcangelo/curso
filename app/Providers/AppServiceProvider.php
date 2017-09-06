<?php

namespace App\Providers;

use App\Model\Aluno;
use App\Observers\AlunoObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); //TODO correção: Comprimentos do índice e MySQL / MariaDB https://laravel.com/docs/5.4/migrations
        Aluno::observe(AlunoObserver::class);
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

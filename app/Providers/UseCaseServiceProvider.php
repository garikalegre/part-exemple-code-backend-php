<?php

namespace App\Providers;

use App\UseCases\Contracts\ExampleUseCase;
use App\UseCases\ExampleCase;

/**
 * Class UseCaseServiceProvider
 * @package App\Providers
 */
class UseCaseServiceProvider extends ServiceProvider
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
      $this->app->bind(ExampleUseCase::class, ExampleCase::class);
    }
}

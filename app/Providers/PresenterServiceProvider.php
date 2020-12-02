<?php

namespace App\Providers;

use App\Presenters\Api\ExampleApiPresenter;
use App\Presenters\Contracts\ExamplePresenter;

/**
 * Class PresenterServiceProvider
 * @package App\Providers
 */
class PresenterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       $this->app->bind(ExamplePresenter::class, ExampleApiPresenter::class);
    }
}

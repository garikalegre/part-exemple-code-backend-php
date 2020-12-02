<?php

namespace App\Providers;

use App\Services\ExampleService;
use App\Servoces\Contracts\ExampleServiceInterface;
use App\Utils\Adapters\Config\Config as ConfigImpl;
use App\Utils\Adapters\Config\Contracts\Config;
use App\Utils\Adapters\Container\Contracts\Container;
use App\Utils\Adapters\Container\LaravelContainer;
use App\Utils\Adapters\JobDispatcher\Contracts\JobDispatcher;
use App\Utils\Adapters\JobDispatcher\JobDispatcher as JobDispatcherImpl;
use App\Utils\Encoders\Contracts\JsonEncoder;
use App\Utils\Encoders\JsonEncoder as JsonEncoderImpl;
use App\Utils\Serializer\Contracts\Serializer;
use App\Utils\Serializer\Serializer as SerializerImpl;


/**
 * Class AppServiceProvider
 * @package App\Providers
 */
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
        $this->app->bind(Config::class, ConfigImpl::class);
        $this->app->bind(Container::class, LaravelContainer::class);
        $this->app->bind(JsonEncoder::class, JsonEncoderImpl::class);
        $this->app->bind(Serializer::class, SerializerImpl::class);
        $this->app->bind(JobDispatcher::class, JobDispatcherImpl::class);
        $this->app->bind(ExampleServiceInterface::class, ExampleService::class);

    }
}

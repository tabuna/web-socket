<?php

namespace Orchid\Socket\Providers;

use Illuminate\Support\ServiceProvider;

class SocketServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerConfig();
        $this->registerProviders();
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            realpath(__DIR__.'/../Config/socket.php') => config_path('socket.php'),
            realpath(__DIR__.'/../socket.php')        => base_path('routes/socket.php'),
        ]);
        $this->mergeConfigFrom(
            realpath(__DIR__.'/../Config/socket.php'), 'socket'
        );
    }

    public function registerProviders()
    {
        $this->app->register('Orchid\\Socket\\Providers\\ConsoleServiceProvider');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'Orchid\Socket\Providers\ConsoleServiceProvider',
        ];
    }
}

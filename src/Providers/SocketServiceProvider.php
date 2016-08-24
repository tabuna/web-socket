<?php namespace Orchid\Socket\Providers;

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
            __DIR__ . '/../Config/socket.php' => config_path('socket.php'),
            __DIR__ . '/../socket.php' => base_path('routes/socket.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/socket.php', 'socket'
        );
    }


    public function registerProviders()
    {
        $this->app->register('Orchid\\Socket\\Providers\\ConsoleServiceProvider');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
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

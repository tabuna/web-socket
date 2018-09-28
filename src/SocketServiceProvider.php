<?php

declare(strict_types=1);

namespace Orchid\Socket;

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
     * @var array
     */
    protected $commands = [
        ServerCommand::class,
        SocketCommand::class,
    ];

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            dirname(__DIR__).'/config/socket.php' => config_path('socket.php'),
            dirname(__DIR__).'/stubs/socket.php'  => base_path('routes/socket.php'),
        ]);
        $this->mergeConfigFrom(
            dirname(__DIR__).'/config/socket.php', 'socket'
        );
    }

    /**
     * Register the commands.
     */
    public function register()
    {
        foreach ($this->commands as $command) {
            $this->commands($command);
        }
    }
}

<?php

declare(strict_types=1);

namespace Orchid\Socket;

use Illuminate\Console\Command;
use Ratchet\App as Socket;

class ServerCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'socket:serve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start web socket server.';

    /**
     * $httpHost HTTP hostname clients intend to connect to.
     * MUST match JS `new WebSocket('ws://$httpHost').
     */
    protected $httpHost;

    /**
     * Port to listen on. If 80, assuming production,
     * Flash on 843 otherwise expecting Flash to be proxied through 8843.
     */
    protected $port;

    /**
     *IP address to bind to. Default is localhost/proxy only.
     *'0.0.0.0' for any machine.
     */
    protected $address;

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        foreach (config('socket', []) as $property => $value) {
            $this->$property = $value;
        }

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $socket = new Socket($this->httpHost, $this->port, $this->address);
        require base_path('routes/socket.php');
        $this->info('Laravel web socket server started on '.$this->httpHost.':'.$this->port.'/'.'address:'.$this->address);
        $socket->run();
    }
}

<?php namespace Orchid\Socket\Console;

use Config;
use Illuminate\Console\Command;
use Ratchet\App as Socket;
use Ratchet\ConnectionInterface;
use Ratchet\Http\HttpServer;
use Ratchet\MessageComponentInterface;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class Server extends Command
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
     * MUST match JS `new WebSocket('ws://$httpHost')
     */
    protected $httpHost;


    /**
     * Port to listen on. If 80, assuming production,
     * Flash on 843 otherwise expecting Flash to be proxied through 8843
     */
    protected $port;

    /**
     *IP address to bind to. Default is localhost/proxy only.
     *'0.0.0.0' for any machine.
     */
    protected $address;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $config = Config::get('socket');
        $this->httpHost = $config['httpHost'];
        $this->port = $config['port'];
        $this->address = $config['address'];
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $socket = new Socket($this->httpHost, $this->port, $this->address);
        require_once(app_path() . '/Socket/routes.php');
        $this->info('Laravel web socket server started on ' . $this->httpHost . ':' . $this->port . '/' . 'address:' . $this->address);
        $socket->run();
    }


}

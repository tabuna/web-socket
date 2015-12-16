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
     * Url adress
     *
     * @var string
     */
    protected $url;


    /**
     * Socket Port
     *
     * @var number
     */
    protected $port;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->url = Config::get('socket.url', 'localhost');
        $this->port = Config::get('socket.port', '8080');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $socket = new Socket($this->url, $this->port);
        require_once(app_path() . '/Socket/routes.php');
        $this->info('Laravel web socket server started on ' . $this->url . ':' . $this->port . '/');
        $socket->run();
    }


}

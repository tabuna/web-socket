<?php
namespace Orchid\Socket;

use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class BaseSocketListener implements MessageComponentInterface
{

    public function onOpen(ConnectionInterface $conn)
    {
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
    }

    public function onClose(ConnectionInterface $conn)
    {
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
    }
}

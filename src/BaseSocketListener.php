<?php

namespace Orchid\Socket;

use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

abstract class BaseSocketListener implements MessageComponentInterface
{
    abstract public function onOpen(ConnectionInterface $conn);

    abstract public function onMessage(ConnectionInterface $from, $msg);

    abstract public function onClose(ConnectionInterface $conn);

    abstract public function onError(ConnectionInterface $conn, \Exception $e);
}

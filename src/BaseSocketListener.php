<?php

namespace Orchid\Socket;

use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

abstract class BaseSocketListener implements MessageComponentInterface
{
    /**
     * @param ConnectionInterface $conn
     *
     * @return mixed
     */
    abstract public function onOpen(ConnectionInterface $conn);

    /**
     * @param ConnectionInterface $from
     * @param string              $msg
     *
     * @return mixed
     */
    abstract public function onMessage(ConnectionInterface $from, $msg);

    /**
     * @param ConnectionInterface $conn
     *
     * @return mixed
     */
    abstract public function onClose(ConnectionInterface $conn);

    /**
     * @param ConnectionInterface $conn
     * @param \Exception          $e
     *
     * @return mixed
     */
    abstract public function onError(ConnectionInterface $conn, \Exception $e);
}

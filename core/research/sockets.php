<?php
// Implementation of the chat in ws
use Ratchet\WebSocket\WsServer;
use Ratchet\Server\IoServer;

class MyWebSocketServer extends WsServer {
    protected $clients;
    protected $users;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->users = [];
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        // Send a welcome message to the new client
        $conn->send('Hello, welcome to the chat!');
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;

        // Parse the message to see if it's a login or chat message
        if (strpos($msg, '/login') === 0) {
            // Login message, add the user to the list of users
            $this->users[$from->resourceId] = substr($msg, 7);

            $from->send('Welcome, ' . $this->users[$from->resourceId]);
        } else {
            // Chat message, send it to all clients
            foreach ($this->clients as $client) {
                $client->send($this->users[$from->resourceId] . ': ' . $msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        // Remove the user from the list of users
        unset($this->users[$conn->resourceId]);
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}

$server = IoServer::factory(
    new MyWebSocketServer(),
    8080 // The port to run the server on
);

$server->run();

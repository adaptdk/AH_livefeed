<?php

require __DIR__ . '/../vendor/autoload.php';


echo "WebSocket server started, enter Ctrl+C to stop server." . PHP_EOL;
\Gomoob\WebSocket\Server\WebSocketServer::factory(
)->run();

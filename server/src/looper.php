<?php

namespace Hackathon\Livefeed;

require __DIR__ . '/../vendor/autoload.php';
use Gomoob\WebSocket\Client\WebSocketClient;
use Gomoob\WebSocket\Request\WebSocketRequest;
require 'TestAddresses.php';

$phpClient = new WebSocketClient('ws://localhost:8888');
$testAddresses = new TestAddresses();

while(true) {
    $addr = $testAddresses->getRandomAddress();
    $order = Order::create();

    # enrich order
    $order->lat = $addr->y;
    $order->long = $addr->x;
    $order->postCode = $addr->postnr;

    $phpClient->send(
        WebSocketRequest::create((string) $order)
    );

    echo sprintf("Order sent...%s", PHP_EOL);

    # sleep some time
    sleep(rand(1,4));
}

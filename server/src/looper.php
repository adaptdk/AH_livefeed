<?php

namespace Hackathon\Livefeed;

require __DIR__ . '/../vendor/autoload.php';
use Carbon\Carbon;
use Faker\Factory;
use Faker\Provider\da_DK\Address;

use Hackathon\Livefeed\Order;
use Hackathon\Livefeed\OrderFeed;
use Gomoob\WebSocket\Client\WebSocketClient;
use Gomoob\WebSocket\Request\WebSocketRequest;
require 'TestAddresses.php';

$phpClient = new WebSocketClient('ws://localhost:8081');

while(true) {
    $addr = TestAddresses::getRandomAddress();
    $order = Order::create();

    # enrich order
    $order->lat = $addr->x;
    $order->long = $addr->y;
    $order->postCode = $addr->postnr;

    // UPDATE WEBSOCKET
    echo "$order\n";
/*
    $response = $phpClient->send(
        WebSocketRequest::create("$order")
    );
*/
    # sleep some time
    sleep(rand(1,4));
}

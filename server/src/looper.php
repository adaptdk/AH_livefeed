<?php

namespace Hackathon\Livefeed;

require __DIR__ . '/../vendor/autoload.php';
use Carbon\Carbon;
use Faker\Factory;
use Faker\Provider\da_DK\Address;

use Hackathon\Livefeed\Order;
use Hackathon\Livefeed\OrderFeed;
require 'TestAddresses.php';


while(true) {
    $addr = TestAddresses::getRandomAddress();
    $order = Order::create();

    # enrich order
    $order->lat = $addr->x;
    $order->long = $addr->y;
    $order->postCode = $addr->postnr;

    // UPDATE WEBSOCKET
    var_dump($order);

    # sleep some time
    sleep(rand(1,4));
}

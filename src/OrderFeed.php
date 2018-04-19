<?php

namespace Hackathon\Livefeed;

/**
 * Class OrderFeed
 *
 * @package Hackathon\Livefeed
 */
final class OrderFeed
{

    const DEFAULT_ORDER_COUNT = 10;

    /**
     * @param int $amount
     * @return string
     */
    public static function getOrders(int $amount = self::DEFAULT_ORDER_COUNT): string
    {
        $orders = [];
        for ($i = 0; $i < $amount; $i++) {
            $orders[] = Order::create();
        }

        return json_encode($orders);
    }

}

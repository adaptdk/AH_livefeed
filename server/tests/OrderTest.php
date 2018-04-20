<?php
declare(strict_types=1);

use Hackathon\Livefeed\Order;
use Hackathon\Livefeed\OrderFeed;
use PHPUnit\Framework\TestCase;

final class OrderTest extends TestCase
{

    public function testCanSupplyFeedWithOrders(): void
    {
        $feed = OrderFeed::getOrders(4);
        $this->assertJson($feed);
    }

    public function testCanCreateOrdersByAmount()
    {
        $feed = json_decode(OrderFeed::getOrders(5));
        $this->assertEquals(count($feed), 5);
    }

    public function testCanUseFakerToProductCreateProperties(): void
    {
        $order = Order::create();
        $this->assertTrue(is_string($order->firstName));
    }

    public function testCanBeCreatedFromNamedConstructor(): void
    {
        $order = Order::create();
        $this->assertInstanceOf(Order::class, $order);
    }

    public function testCanPickRandomStatus(): void
    {
        $order = Order::create();
        $this->assertTrue(in_array($order->status, $order::STATUSES));
    }

    public function testCanUseCarbonToCreateIso8601DateString(): void
    {
        $order = Order::create();
        $this->assertTrue(is_string($order->postCode));
    }

    public function testCanReturnJsonBasedOnOrder(): void
    {
        $order = Order::create();
        $this->assertInstanceOf(Order::class, $order);
        $this->assertJson((string) $order);
    }

}

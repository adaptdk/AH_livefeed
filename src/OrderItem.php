<?php
declare(strict_types=1);

use Faker\Factory;
use Hackathon\Livefeed\Product;

final class OrderItem
{
    const DEFAULT_ORDER_ITEMS = 2;

    public $price;
    public $orderId;
    public $quantity;
    public $product;

    /**
     * OrderItem constructor.
     */
    private function __construct()
    {
        $faker = Factory::create('da_DK');

        $price = rand(5000, 150000);
        $this->quantity = rand(1, 5);
        $this->price = $price * $this->quantity;
        $this->orderId = $faker->uuid;
        $this->product = Product::create();
    }

    /**
     * @param int $amount
     * @return array
     */
    public static function create(int $amount = self::DEFAULT_ORDER_ITEMS): array
    {
        $orderItems = [];
        for ($i = 0; $i < $amount; $i++) {
            $orderItems[] = new self;
        }

        return $orderItems;
    }

}

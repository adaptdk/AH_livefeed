<?php

namespace Hackathon\Livefeed;

use Carbon\Carbon;
use Faker\Factory;
use Faker\Provider\da_DK\Address;
use OrderItem;

class Order
{
    const STATUSES = ['shipped', 'completed'];

    public $id;
    public $status;
    public $orderDate;
    public $firstName;
    public $lastName;
    public $postCode;
    public $orderItems;
    public $totalPrice;

    /**
     * Order constructor.
     */
    private function __construct()
    {
        $faker = Factory::create('da_DK');

        # Order
        $this->id = $faker->uuid;
        $this->status = $faker->randomElement(self::STATUSES);
        $this->orderDate = Carbon::now()->toIso8601String();

        # Customer
        $this->firstName = $faker->firstName;
        $this->lastName = $faker->lastName;
        $this->postCode = Address::postcode();

        # OrderItems
        $this->orderItems = OrderItem::create(5);
        $this->totalPrice = array_sum(array_column($this->orderItems, 'price'));
    }

    /**
     * @return \Hackathon\Livefeed\Order
     */
    public static function create(): self
    {
        return new static;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return json_encode($this);
    }
}

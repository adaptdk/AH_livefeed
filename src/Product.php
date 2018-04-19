<?php

namespace Hackathon\Livefeed;

use Faker\Factory;

final class Product
{

    const BRANDS = [
      'Nike',
      'Adidas',
      'Asics',
      'Reebok',
      'New Balance',
      'Carhartt',
      'Nike SB',
      'The North Face',
      'Common Projects'
    ];

    const CATEGORIES = [
      'Sneakers',
      'T-shirts',
      'Jackets',
      'Shirts',
      'Pants',
      'Shorts'
    ];

    public $id;
    public $name;
    public $brand;
    public $category;
    public $description;

    /**
     * Product constructor.
     */
    private function __construct()
    {
        $faker = Factory::create('da_DK');

        $this->id = $faker->uuid;
        $this->name = $faker->colorName;
        $this->description = $faker->sentence(rand(2, 8));
        $this->brand = $faker->randomElement(self::BRANDS);
        $this->category = $faker->randomElement(self::CATEGORIES);
    }

    /**
     * @return mixed
     */
    public static function create(): self
    {
        return new self;
    }

}

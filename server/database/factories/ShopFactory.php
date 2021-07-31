<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shop::class;

    /** @var int */
    private static int $number = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => self::$number++,
            'name' => $this->faker->name(),
            'grid_x' => $this->faker->latitude(),
            'grid_y' => $this->faker->longitude(),
        ];
    }
}

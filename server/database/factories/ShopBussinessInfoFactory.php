<?php

namespace Database\Factories;

use App\Models\Shop;
use App\Models\ShopBussinessInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopBussinessInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShopBussinessInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shop_id'             => Shop::factory(),
            'start'               => '10:00:00',
            'end'                 => '18:00:00',
            'week_day_code'       => $this->faker->randomNumber(1, 7),
            'is_closed'           => $this->faker->boolean(),
        ];
    }
}

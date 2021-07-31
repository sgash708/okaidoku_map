<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

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
            'id'              => self::$number++,
            'handle_name'     => $this->faker->userName(),
            'last_name'       => $this->faker->lastName(),
            'last_name_kana'  => $this->faker->lastKanaName(),
            'first_name'      => $this->faker->firstName(),
            'first_name_kana' => $this->faker->firstKanaName(),
            'phone_number'    => $this->faker->phoneNumber(),
            'email'           => $this->faker->unique()->safeEmail(),
            'password'        => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'sex'             => $this->faker->numberBetween(0, 4),
            'remember_token'  => Str::random(10),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'handle_name'     => $this->faker->userName(),
            'last_name'       => $this->faker->lastName(),
            'last_name_kana'  => $this->faker->lastKanaName(),
            'first_name'      => $this->faker->firstName(),
            'first_name_kana' => $this->faker->firstKanaName(),
            'phone_number'    => $this->faker->phoneNumber(),
            'email'           => $this->faker->unique()->safeEmail(),
            'password'        => Hash::make('password'),
            'sex'             => $this->faker->numberBetween(0, 2),
            'remember_token'  => Str::random(10),
        ];
    }
}

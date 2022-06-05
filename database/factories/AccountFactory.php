<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Currency;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user=User::All();
        $currency=Currency::All();
        return [
            'account_number' =>  $this->faker->unique()->ean13(),
            'balance' =>  $this->faker->randomDigit(3),
            'user_id'=> $user->random()->id,
            'currency_id'=> $currency->random()->id
        ];
    }
}

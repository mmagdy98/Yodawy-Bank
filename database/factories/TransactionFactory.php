<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Currency;
use App\Models\Account;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $currency=Currency::All();
        $account=Account::All();
        return [
                'amount' => $this->faker->randomDigit(),
                'currency_id'=> $currency->random()->id,
                'send_account_id'=> $account->random()->id,
                'receive_account_id'=> $account->random()->id
        ];
    }
}

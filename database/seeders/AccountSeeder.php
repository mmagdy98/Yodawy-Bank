<?php

namespace Database\Seeders;
use Database\Factories;
use App\Models\Account;
use App\Models\User;
use app\Models\Currency;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::factory()
        ->count(20)
        ->create();
    }
}

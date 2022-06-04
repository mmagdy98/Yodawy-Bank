<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        can seed using insert
        DB::table('users')->insert([
            'name' => 'Fares',
            'email' => 'Fares@gmail.com',
            'password' => Hash::make('fares123'),
        ]);*/
        User::factory()
            ->count(50)
            ->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('ar_SA');

        foreach (range(1, 50) as $index) {
            DB::table('users')->insert([
                'first_name' => $faker->name,
                'last_name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'username'=> $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => $faker->regexify('[A-Za-z0-9]{10}'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

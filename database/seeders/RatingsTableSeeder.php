<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RatingsTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('ar_SA');

        $userIds = DB::table('users')->pluck('id')->toArray();
        $productIds = DB::table('products')->pluck('id')->toArray();

        foreach (range(1, 100) as $index) {
            DB::table('ratings')->insert([
                'user_id' => $faker->randomElement($userIds),
                'product_id' => $faker->randomElement($productIds),
                'rating_value' => $faker->randomFloat(1, 1, 5),
                'comment' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

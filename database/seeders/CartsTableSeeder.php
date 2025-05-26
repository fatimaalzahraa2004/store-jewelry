<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CartsTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('ar_SA');

        $userIds = DB::table('users')->pluck('id')->toArray();
        $productIds = DB::table('products')->pluck('id')->toArray();

        foreach (range(1, 100) as $index) {
            $productId = $faker->randomElement($productIds);
            $quantity = $faker->numberBetween(1, 5);
            $price = DB::table('products')->where('id', $productId)->value('price');
            $total = $price * $quantity;

            DB::table('carts')->insert([
                'user_id' => $faker->randomElement($userIds),
                'product_id' => $productId,
                'quantity' => $quantity,
                'total_price' => $total,
                'added_time' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

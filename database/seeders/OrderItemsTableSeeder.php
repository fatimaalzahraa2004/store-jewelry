<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrderItemsTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('ar_SA');

        $orderIds = DB::table('orders')->pluck('id')->toArray();
        $productIds = DB::table('products')->pluck('id')->toArray();

        foreach ($orderIds as $orderId) {
            foreach (range(1, rand(1, 5)) as $index) {
                $productId = $faker->randomElement($productIds);
                $quantity = $faker->numberBetween(1, 5);
                $price = DB::table('products')->where('id', $productId)->value('price');
                $total = $price * $quantity;

                DB::table('order_items')->insert([
                    'order_id' => $orderId,
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
}

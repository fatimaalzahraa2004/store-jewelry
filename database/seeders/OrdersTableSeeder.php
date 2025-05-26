<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrdersTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('ar_SA');

        $userIds = DB::table('users')->pluck('id')->toArray();
        $statuses = ['جديد', 'تم الدفع', 'ملغي'];

        foreach (range(1, 50) as $index) {
            DB::table('orders')->insert([
                'user_id' => $faker->randomElement($userIds),
                'order_date' => $faker->dateTimeBetween('-1 year', 'now'),
                'total_price' => $faker->randomFloat(2, 50, 5000),
                'status' => $faker->randomElement($statuses),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

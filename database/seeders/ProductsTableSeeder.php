<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('ar_SA');

        $userIds = DB::table('users')->pluck('id')->toArray();
        $typeIds = DB::table('product_types')->pluck('id')->toArray();
        $statuses = ['قيد التحقق', 'تم الإضافة', 'تم الرفض', 'تم البيع'];

        foreach (range(1, 100) as $index) {
            DB::table('products')->insert([
                'product_name' => $faker->word,
                'price' => $faker->randomFloat(2, 10, 1000),
                'type_id' => $faker->randomElement($typeIds),
                'album_photos' => json_encode([$faker->imageUrl(), $faker->imageUrl()]),
                'shape' => $faker->word,
                'owner_user_id' => $faker->randomElement($userIds),
                'status' => $faker->randomElement($statuses),
                'rating' => $faker->randomFloat(1, 1, 5),
                'weight' => $faker->randomFloat(2, 0.1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

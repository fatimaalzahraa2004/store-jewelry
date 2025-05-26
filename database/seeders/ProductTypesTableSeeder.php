<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductTypesTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('ar_SA');

        foreach (range(1, 10) as $index) {
            DB::table('product_types')->insert([
                'type_name' => $faker->word,
                'description' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

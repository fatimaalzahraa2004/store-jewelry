<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SessionsTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('ar_SA');

        $userIds = DB::table('users')->pluck('id')->toArray();

        foreach (range(1, 50) as $index) {
            DB::table('sessions')->insert([
                'id' => $faker->uuid,
                'user_id' => $faker->randomElement($userIds),
                'ip_address' => $faker->ipv4,
                'user_agent' => $faker->userAgent,
                'payload' => json_encode(['data' => $faker->sentence]),
                'last_activity' => time(),
            ]);
        }
    }
}

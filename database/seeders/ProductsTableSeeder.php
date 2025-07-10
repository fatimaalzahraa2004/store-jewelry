<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema; // ⬅️ إضافة هذا الاستيراد
use App\Models\User;
use App\Models\ProductType;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        // 🔴🔴🔴 تعطيل فحص المفاتيح الأجنبية قبل TRUNCATE 🔴🔴🔴
        Schema::disableForeignKeyConstraints();
        DB::table('products')->truncate();
        // 🔴🔴🔴 إعادة تمكين فحص المفاتيح الأجنبية بعد TRUNCATE 🔴🔴🔴
        Schema::enableForeignKeyConstraints();

        // ... (باقي الكود كما هو)
        $sellerUser = User::where('role', 'بائع')->first();
        $adminUser = User::where('role', 'مدير')->first();
        $ringType = ProductType::where('type_name', 'خواتم')->first();
        $necklaceType = ProductType::where('type_name', 'قلائد')->first();
        $braceletType = ProductType::where('type_name', 'أساور')->first();
        $earringType = ProductType::where('type_name', 'أقراط')->first();
        $diamondType = ProductType::where('type_name', 'مجوهرات الماس')->first();
        $goldType = ProductType::where('type_name', 'مجوهرات ذهب')->first();

        if (!$sellerUser || !$ringType) {
            $this->command->info('Skip products seeding. Please seed users and product types first.');
            return;
        }

        $productsData = [
            [
                'product_name' => 'خاتم ألماس سوليتير كلاسيكي',
                'price' => 3500.00,
                'type_id' => $ringType->id,
                'album_photos' => ['images/product1.jpg', 'images/product1_alt.jpg'],
                'shape' => 'خاتم',
                'owner_user_id' => $sellerUser->id,
                'status' => 'تم الإضافة',
                'rating' => 4.8,
                'weight' => 2.5,
            ],
            [
                'product_name' => 'قلادة ذهب أبيض بتصميم نجمة',
                'price' => 1200.50,
                'type_id' => $necklaceType->id,
                'album_photos' => ['images/product2.jpg'],
                'shape' => 'قلادة',
                'owner_user_id' => $sellerUser->id,
                'status' => 'تم الإضافة',
                'rating' => 4.5,
                'weight' => 5.2,
            ],
            [
                'product_name' => 'سوار تنس ألماس فاخر',
                'price' => 5800.00,
                'type_id' => $braceletType->id,
                'album_photos' => ['images/product3.jpg', 'images/product3_alt.jpg'],
                'shape' => 'سوار',
                'owner_user_id' => $sellerUser->id,
                'status' => 'تم الإضافة',
                'rating' => 4.9,
                'weight' => 10.1,
            ],
            [
                'product_name' => 'أقراط ألماس متدلية',
                'price' => 950.00,
                'type_id' => $earringType->id,
                'album_photos' => ['images/product4.jpg'],
                'shape' => 'أقراط',
                'owner_user_id' => $sellerUser->id,
                'status' => 'تم الإضافة',
                'rating' => 4.7,
                'weight' => 3.0,
            ],
            [
                'product_name' => 'خاتم خطوبة ألماس بيضاوي',
                'price' => 4200.00,
                'type_id' => $ringType->id,
                'album_photos' => ['images/product5.jpg'],
                'shape' => 'خاتم',
                'owner_user_id' => $sellerUser->id,
                'status' => 'قيد التحقق',
                'rating' => null,
                'weight' => 3.1,
            ],
             [
                'product_name' => 'طقم مجوهرات ذهب وفيروز',
                'price' => 2500.00,
                'type_id' => $goldType->id,
                'album_photos' => ['images/product6.jpg'],
                'shape' => 'طقم',
                'owner_user_id' => $sellerUser->id,
                'status' => 'تم الإضافة',
                'rating' => 4.6,
                'weight' => 15.0,
            ],
            [
                'product_name' => 'قلادة ألماس دمعة',
                'price' => 1800.00,
                'type_id' => $diamondType->id,
                'album_photos' => ['images/product7.jpg'],
                'shape' => 'قلادة',
                'owner_user_id' => $sellerUser->id,
                'status' => 'تم البيع',
                'rating' => 5.0,
                'weight' => 4.0,
            ],
        ];

        foreach ($productsData as $data) {
            DB::table('products')->insert([
                'product_name' => $data['product_name'],
                'price' => $data['price'],
                'type_id' => $data['type_id'],
                'album_photos' => json_encode($data['album_photos']),
                'shape' => $data['shape'],
                'owner_user_id' => $data['owner_user_id'],
                'status' => $data['status'],
                'rating' => $data['rating'],
                'weight' => $data['weight'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
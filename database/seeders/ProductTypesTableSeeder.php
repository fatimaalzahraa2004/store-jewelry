<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema; // ⬅️ إضافة هذا الاستيراد

class ProductTypesTableSeeder extends Seeder
{
    public function run(): void
    {
        // 🔴🔴🔴 تعطيل فحص المفاتيح الأجنبية قبل TRUNCATE 🔴🔴🔴
        Schema::disableForeignKeyConstraints();
        DB::table('product_types')->truncate();
        // 🔴🔴🔴 إعادة تمكين فحص المفاتيح الأجنبية بعد TRUNCATE 🔴🔴🔴
        Schema::enableForeignKeyConstraints();

        $productTypes = [
            ['type_name' => 'خواتم', 'description' => 'خواتم ألماس، ذهب، فضة، وأحجار كريمة متنوعة.'],
            ['type_name' => 'أساور', 'description' => 'أساور ذهبية، فضية، وألماسية بتصاميم عصرية وكلاسيكية.'],
            ['type_name' => 'قلائد', 'description' => 'قلائد ذهبية مرصعة بالألماس والأحجار الكريمة.'],
            ['type_name' => 'أقراط', 'description' => 'أقراط ذهبية وألماسية تضفي لمسة من الأناقة.'],
            ['type_name' => 'أطقم مجوهرات', 'description' => 'مجموعات متكاملة من المجوهرات الفاخرة.'],
            ['type_name' => 'مجوهرات الماس', 'description' => 'قطع مجوهرات مرصعة بأجود أنواع الألماس.'],
            ['type_name' => 'مجوهرات ذهب', 'description' => 'تصاميم متنوعة من المجوهرات الذهبية الخالصة.'],
        ];

        foreach ($productTypes as $type) {
            DB::table('product_types')->insert([
                'type_name' => $type['type_name'],
                'description' => $type['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
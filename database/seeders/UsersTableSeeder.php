<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // استيراد نموذج المستخدم
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon; // لاستخدام Carbon لتحديد التواريخ

class UsersTableSeeder extends Seeder
{
    /**
     * تشغيل بذرة قاعدة البيانات.
     */
    public function run(): void
    {
        $faker = Faker::create('ar_SA'); // استخدام اللغة العربية للفيكر

        // 1. إنشاء مستخدم مدير (Admin) للتحقق بسهولة
        User::create([
            'first_name' => 'مدير',
            'last_name' => 'النظام',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // كلمة المرور الافتراضية 'password'
            'gender' => 'ذكر',
            'birth_date' => Carbon::parse('1990-01-01'), // تاريخ ميلاد محدد
            'role' => 'مدير',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. إنشاء مستخدم بائع (Seller) للتحقق بسهولة
        User::create([
            'first_name' => 'بائع',
            'last_name' => 'المتجر',
            'username' => 'seller',
            'email' => 'seller@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'gender' => 'أنثى',
            'birth_date' => Carbon::parse('1995-05-10'),
            'role' => 'بائع',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3. إنشاء مستخدم مشتري (Buyer - مستخدم عادي) للتحقق بسهولة
        User::create([
            'first_name' => 'مشتري',
            'last_name' => 'نشيط',
            'username' => 'buyer',
            'email' => 'buyer@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'gender' => 'ذكر',
            'birth_date' => Carbon::parse('1992-11-20'),
            'role' => 'مستخدم عادي',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 4. إنشاء 47 مستخدمًا عشوائيًا (ليكون المجموع 50)
        // توزيع الأدوار بشكل عشوائي (مثلاً: 70% مشتري، 30% بائع)
        $rolesDistribution = array_merge(
            array_fill(0, 33, 'مستخدم عادي'), // 33 مشتري
            array_fill(0, 14, 'بائع')          // 14 بائع
        );

        foreach (range(1, 47) as $index) {
            $gender = $faker->randomElement(['ذكر', 'أنثى']);
            User::create([
                'first_name' => $faker->firstName($gender === 'ذكر' ? 'male' : 'female'),
                'last_name' => $faker->lastName(),
                'username' => $faker->unique()->userName(),
                'email' => $faker->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'gender' => $gender,
                'birth_date' => $faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'), // تاريخ ميلاد بين 18 و 60 سنة مضت
                'role' => $faker->randomElement($rolesDistribution),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
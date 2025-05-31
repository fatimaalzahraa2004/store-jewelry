<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Support\Arr; // لاستخدام Arr::flatten

class FixProductPhotos extends Command
{
    protected $signature = 'fix:product-photos';
    protected $description = 'Ensures album_photos are a flat JSON array of strings, handling nested arrays.';

    public function handle()
    {
        $this->info('بدء فحص وتصحيح حقل album_photos للمنتجات...');

        $products = Product::all();
        $fixedCount = 0;

        foreach ($products as $product) {
            $originalAlbumPhotos = $product->getRawOriginal('album_photos'); // القيمة الخام من DB
            $currentPhpArray = $product->album_photos; // القيمة بعد الـ casting (قد تكون null، string، أو array)

            $newPhotosArray = [];
            $needsUpdate = false;

            // الحالة 1: إذا كانت القيمة المخزنة في DB فارغة أو NULL
            if ($originalAlbumPhotos === null || $originalAlbumPhotos === '') {
                if ($currentPhpArray !== null && $currentPhpArray !== []) {
                    $newPhotosArray = [];
                    $needsUpdate = true;
                    $this->comment("المنتج ID: {$product->id} - كانت فارغة/NULL، تم التأكد من أنها مصفوفة فارغة.");
                }
            }
            // الحالة 2: إذا كانت القيمة بعد الـ casting هي مصفوفة
            elseif (is_array($currentPhpArray)) {
                // استخدام Arr::flatten لضمان أن المصفوفة مسطحة
                $flattenedPhotos = Arr::flatten($currentPhpArray);
                
                // التأكد من أن جميع العناصر سلاسل نصية
                foreach ($flattenedPhotos as $photo) {
                    if (is_string($photo)) {
                        $newPhotosArray[] = $photo;
                    } else {
                        // إذا كان هناك عنصر ليس سلسلة نصية بعد التسوية، فربما نحتاج لتخطيه أو تحويله
                        // هنا نختار تخطيه لحماية التطبيق
                        $needsUpdate = true; // للإشارة إلى أننا عدلنا شيئًا
                    }
                }

                // التحقق إذا كانت هناك تغييرات حقيقية تستدعي الحفظ
                // نقارن JSON المشفر لتجنب مشاكل الترتيب أو الفروقات البسيطة
                if (json_encode($newPhotosArray) !== $originalAlbumPhotos) {
                    $needsUpdate = true;
                }
                
                if ($needsUpdate) {
                    $product->album_photos = $newPhotosArray;
                    $product->save();
                    $fixedCount++;
                    $this->info("تم تصحيح المنتج ID: {$product->id} (تنظيف وتسطيح المصفوفة).");
                }
            }
            // الحالة 3: إذا كانت القيمة بعد الـ casting ليست مصفوفة (يعني كانت سلسلة نصية غير JSON)
            elseif (is_string($currentPhpArray) && $currentPhpArray !== '') {
                $product->album_photos = [$currentPhpArray]; // تحويلها إلى مصفوفة ذات عنصر واحد
                $product->save();
                $fixedCount++;
                $this->info("تم تصحيح المنتج ID: {$product->id} (تحويل سلسلة نصية مفردة).");
            }
            // أي حالات أخرى (مثل الأرقام التي تم تخزينها بالخطأ) سيتم تحويلها إلى مصفوفة فارغة
             else {
                $product->album_photos = [];
                $product->save();
                $fixedCount++;
                $this->info("تم تصحيح المنتج ID: {$product->id} (تحويل قيمة غير متوقعة).");
            }
        }

        $this->info("انتهى التصحيح. تم تصحيح {$fixedCount} منتج.");
        return 0;
    }
}
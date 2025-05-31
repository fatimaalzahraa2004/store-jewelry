<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Rating;
use App\Models\User; // لاستيراد نموذج المستخدم

class FixRatingsUsers extends Command
{
    protected $signature = 'fix:ratings-users';
    protected $description = 'Ensures user_id in ratings table are valid integers referencing existing users, or sets to NULL.';

    public function handle()
    {
        $this->info('بدء فحص وتصحيح حقل user_id في جدول ratings...');

        $ratings = Rating::all();
        $fixedCount = 0;

        foreach ($ratings as $rating) {
            $originalUserId = $rating->getRawOriginal('user_id'); // القيمة الخام من DB

            // تحقق إذا كانت القيمة رقمية ولكن المستخدم غير موجود
            if (is_numeric($originalUserId) && !User::find($originalUserId)) {
                $rating->user_id = null; // أو يمكنك تعيينها إلى ID مستخدم افتراضي
                $rating->save();
                $fixedCount++;
                $this->warn("تم تصحيح تقييم ID: {$rating->id}. user_id كان {$originalUserId} (غير موجود)، تم تعيينه إلى NULL.");
            }
            // تحقق إذا كانت القيمة ليست رقمية أو فارغة
            elseif (!is_numeric($originalUserId) && $originalUserId !== null && $originalUserId !== '') {
                $rating->user_id = null; // تعيين القيم غير الصالحة إلى NULL
                $rating->save();
                $fixedCount++;
                $this->warn("تم تصحيح تقييم ID: {$rating->id}. user_id كان غير رقمي '{$originalUserId}'، تم تعيينه إلى NULL.");
            }
            // إذا كانت القيمة فارغة (سلسلة نصية) قم بتحويلها إلى NULL
            elseif ($originalUserId === '') {
                $rating->user_id = null;
                $rating->save();
                $fixedCount++;
                $this->warn("تم تصحيح تقييم ID: {$rating->id}. user_id كان فارغاً، تم تعيينه إلى NULL.");
            }
        }

        $this->info("انتهى التصحيح. تم تصحيح {$fixedCount} تقييم.");
        return 0;
    }
}
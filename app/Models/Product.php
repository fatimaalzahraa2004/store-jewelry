<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr; // تأكد من استيراد هذا Helper
use Illuminate\Database\Eloquent\Relations\BelongsToMany; // ⬅️ تأكد من استيراد هذه السمة

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'price',
        'type_id',
        'album_photos', // 🔴🔴🔴 احتفظ به هنا
        'shape',
        'owner_user_id',
        'status',
        'rating',
        'weight',
    ];

    public $timestamps = true;

    protected $casts = [
        'price' => 'decimal:2',
        'rating' => 'decimal:1',
        'weight' => 'float',
        // 'album_photos' => 'array', // 🔴🔴🔴 قم بإزالة هذا السطر بالكامل 🔴🔴🔴
    ];

    // 🔴🔴🔴 Accessor: لتحويل البيانات المخزنة من JSON إلى مصفوفة عند القراءة 🔴🔴🔴
    public function getAlbumPhotosAttribute($value): array
    {
        // إذا كانت القيمة NULL أو فارغة، أرجع مصفوفة فارغة
        if (is_null($value) || $value === '') {
            return [];
        }

        // حاول فك ترميز JSON
        $decoded = json_decode($value, true);

        // إذا لم يكن الفك صحيحاً أو لم ينتج عنه مصفوفة، أرجع مصفوفة فارغة
        // وإلا قم بتسطيح المصفوفة للتأكد من عدم وجود تداخل (هذا يحل مشكلة Array to string conversion)
        return is_array($decoded) ? Arr::flatten($decoded) : [];
    }

    // 🔴🔴🔴 Mutator: لتحويل المصفوفة إلى JSON عند الحفظ 🔴🔴🔴
    public function setAlbumPhotosAttribute($value): void
    {
        // تأكد أن القيمة هي مصفوفة، ثم قم بتسطيحها وإزالة أي قيم غير نصية أو فارغة
        $cleanedPhotos = [];
        if (is_array($value)) {
            $flattened = Arr::flatten($value);
            foreach ($flattened as $photoPath) {
                if (is_string($photoPath) && !empty($photoPath)) {
                    $cleanedPhotos[] = $photoPath;
                }
            }
        }
        // قم بتخزينها كسلسلة JSON
        $this->attributes['album_photos'] = json_encode($cleanedPhotos);
    }

    // العلاقة مع نوع المنتج
    public function type(): BelongsTo
    {
        return $this->belongsTo(ProductType::class, 'type_id');
    }

    // العلاقة مع مالك المنتج (المستخدم)
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_user_id');
    }

    // العلاقة مع التقييمات: كل منتج لديه العديد من التقييمات
    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class, 'product_id');
    }
    // 🔴🔴🔴 أضف هذه العلاقة الجديدة (اختياري) 🔴🔴🔴
    // المستخدمون الذين أضافوا هذا المنتج إلى قائمة مفضلتهم
    public function wishedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'wishlists', 'product_id', 'user_id');
    }
}
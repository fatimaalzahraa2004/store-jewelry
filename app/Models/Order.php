<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany; // ⬅️ تأكد من استيراد هذه السمة

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'order_date',
        'total_price',
        'status',
    ];

    public $timestamps = true;

    protected $casts = [
        'order_date' => 'datetime',
        'total_price' => 'decimal:2',
    ];

    // العلاقة مع المستخدم
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // 🔴🔴🔴 أضف هذه العلاقة الجديدة 🔴🔴🔴
    // العلاقة مع عناصر الطلب: كل طلب لديه العديد من عناصر الطلب
    public function items(): HasMany
    {
        // 'order_id' هو المفتاح الأجنبي في جدول 'order_items' الذي يشير إلى 'id' الطلب
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
}
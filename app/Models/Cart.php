<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'added_time',
        'total_price', // ✅ الحقل المضاف

    ];

    public $timestamps = true;

    protected $casts = [
        'added_time' => 'datetime',     
        'total_price' => 'decimal:2', // ✅ تحويل القيمة لرقم عشري تلقائيًا
    ];

    // علاقة مع المستخدم
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // علاقة مع المنتج
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}

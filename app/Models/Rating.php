<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    protected $table = 'ratings';

    protected $fillable = [
        'user_id',
        'product_id',
        'rating_value',
        'comment',
    ];

    public $timestamps = true;

    protected $casts = [
        'rating_value' => 'decimal:1',
    ];

    // العلاقة مع المستخدم
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // العلاقة مع المنتج
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

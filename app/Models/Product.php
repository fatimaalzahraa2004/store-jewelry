<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'price',
        'type_id',
        'album_photos',
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
        'album_photos' => 'array', // في حال خزنتها بصيغة JSON
    ];

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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlists'; // اسم الجدول

    protected $fillable = [
        'user_id',
        'product_id',
    ];

    public $timestamps = true;

    /**
     * العلاقة مع المستخدم الذي أضاف هذا المنتج إلى المفضلة.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * العلاقة مع المنتج الذي تم إضافته إلى المفضلة.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
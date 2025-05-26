<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductType extends Model
{
    protected $table = 'product_types';

    protected $fillable = [
        'type_name',
        'description',
    ];

    public $timestamps = true;

    // العلاقة مع المنتجات: كل نوع منتج له عدة منتجات
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'type_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany; // إضافة لاستخدام HasMany

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'gender',
        'birth_date',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birth_date' => 'date', // تحويل تاريخ الميلاد إلى كائن تاريخ
        ];
    }

    /**
     * الدالة المساعدة للتحقق إذا كان المستخدم مشرفًا.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'مدير';
    }

    /**
     * الدالة المساعدة للتحقق إذا كان المستخدم بائعًا.
     */
    public function isSeller(): bool
    {
        return $this->role === 'بائع';
    }

    /**
     * الدالة المساعدة للتحقق إذا كان المستخدم مشتريًا (مستخدم عادي).
     */
    public function isBuyer(): bool
    {
        return $this->role === 'مستخدم عادي';
    }

    // العلاقات التي يجب أن تضاف لنموذج User
    // المنتجات التي يملكها هذا المستخدم (إذا كان بائعاً)
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'owner_user_id');
    }

    // سلة التسوق الخاصة بهذا المستخدم (إذا كان مشترياً)
    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class, 'user_id');
    }

    // الطلبات التي قام بها هذا المستخدم (إذا كان مشترياً)
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    // التقييمات التي قام بها هذا المستخدم
    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class, 'user_id');
    }
    // 🔴🔴🔴 أضف هذه العلاقة الجديدة 🔴🔴🔴
    // قائمة المفضلة الخاصة بهذا المستخدم
    public function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class, 'user_id');
    }
}
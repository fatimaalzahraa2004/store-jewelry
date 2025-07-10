<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist; // تأكد من استيراد Wishlist
use Illuminate\Support\Facades\Auth; // تأكد من استيراد Auth
use App\Enums\ProductStatus; // تأكد من استيراد ProductStatus

class HomePageController extends Controller
{
    /**
     * عرض الصفحة الرئيسية مع أحدث المنتجات.
     */
    public function index()
    {
        // جلب أحدث 8 منتجات تم إضافتها ومتاحة للعرض
        $latestProducts = Product::where('status', 'تم الإضافة')
                                 ->latest()
                                 ->take(8)
                                 ->get();

        // 🔴🔴🔴 التعديل هنا: تعريف $userWishlistItems بقيمة افتراضية 🔴🔴🔴
        $userWishlistItems = collect(); // افتراضياً، مجموعة فارغة

        if (Auth::check() && Auth::user()->isBuyer()) {
            // جلب عناصر المفضلة للمستخدم مع معرفات المنتجات ومعرفات عناصر المفضلة
            $userWishlistItems = Auth::user()->wishlists()->select('id', 'product_id')->get();
        }

        // تمرير جميع المتغيرات إلى الـ View
        return view('welcome', compact('latestProducts', 'userWishlistItems'));
    }
}
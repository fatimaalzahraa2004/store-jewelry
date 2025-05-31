<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;

class ProductController extends Controller
{
    /**
     * عرض قائمة بجميع المنتجات (يمكن للزوار والمستخدمين رؤيتها).
     */
    public function index(Request $request)
    {
        $query = Product::with('type', 'owner');

        // البحث حسب الصنف
        // 🔴🔴🔴 التعديل هنا: استخدام filled() 🔴🔴🔴
        if ($request->filled('type_id')) {
            $query->where('type_id', $request->type_id);
        }

        // البحث حسب السعر
        // 🔴🔴🔴 التعديل هنا: استخدام filled() 🔴🔴🔴
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        // 🔴🔴🔴 التعديل هنا: استخدام filled() 🔴🔴🔴
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // البحث حسب اسم المنتج
        // 🔴🔴🔴 التعديل هنا: استخدام filled() 🔴🔴🔴
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) { // ⬅️ يفضل استخدام callback لضمان تجميع شروط OR
                $q->where('product_name', 'like', "%{$search}%")
                  ->orWhereHas('type', function ($q_type) use ($search) { // ⬅️ تغيير اسم المتغير لتجنب تداخل النطاقات
                      $q_type->where('type_name', 'like', "%{$search}%");
                  });
            });
        }

        // عرض فقط المنتجات التي "تم الإضافة" أو "تم البيع" (وليس "قيد التحقق" أو "تم الرفض")
        $query->whereIn('status', ['تم الإضافة', 'تم البيع']);

        $products = $query->paginate(10);
        $productTypes = ProductType::all();

        $userWishlistItems = collect();
        if (Auth::check() && Auth::user()->isBuyer()) {
            $userWishlistItems = Auth::user()->wishlists()->select('id', 'product_id')->get();
        }

        return view('products.index', compact('products', 'productTypes', 'userWishlistItems'));
    }

    /**
     * عرض تفاصيل منتج معين.
     */
  public function show(Product $product)
    {
        if (!in_array($product->status, ['تم الإضافة', 'تم البيع'])) {
            abort(404, 'المنتج غير متوفر للعرض.');
        }

        $product->load('type', 'owner', 'ratings.user');

        $isProductInWishlist = false;
        $wishlistItemId = null;
        if (Auth::check() && Auth::user()->isBuyer()) {
            $wishlistItem = Auth::user()->wishlists()->where('product_id', $product->id)->first();
            if ($wishlistItem) {
                $isProductInWishlist = true;
                $wishlistItemId = $wishlistItem->id;
            }
        }

        return view('products.show', compact('product', 'isProductInWishlist', 'wishlistItemId'));
    }
}
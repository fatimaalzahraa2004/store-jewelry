<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * عرض الصفحة الرئيسية للموقع.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // جلب أحدث 8 منتجات تم إضافتها وحالتها 'تم الإضافة'
        $latestProducts = Product::where('status', 'تم الإضافة')
                                ->latest() // يرتب حسب created_at تنازلياً
                                ->take(8)  // جلب 8 منتجات فقط
                                ->get();

        return view('welcome', compact('latestProducts'));
    }
}
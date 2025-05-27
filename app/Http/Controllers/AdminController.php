<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    /**
     * يجب أن يكون المستخدم مشرفاً.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole:مدير'); // Middleware للتحقق من أن الدور مدير
    }

    /**
     * عرض لوحة تحكم المشرف الرئيسية.
     */
    public function dashboard()
    {
        // جلب بعض الإحصائيات لعرضها في لوحة التحكم
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $pendingProducts = Product::where('status', 'قيد التحقق')->count();
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'جديد')->count();

        return view('admin.dashboard', compact('totalUsers', 'totalProducts', 'pendingProducts', 'totalOrders', 'pendingOrders'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // استخدام Auth

class HomeController extends Controller
{
    /**
     * إنشاء مثيل متحكم جديد.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * عرض لوحة تحكم التطبيق.
     * يمكن تخصيصها لتوجيه كل دور إلى لوحة التحكم الخاصة به.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard'); // أو view('admin.home')
        } elseif (Auth::user()->isSeller()) {
            return redirect()->route('seller.dashboard'); // أو view('seller.home')
        } else { // المستخدم العادي (المشتري)
            return view('home'); // الصفحة الرئيسية الافتراضية للمستخدمين العاديين
        }
    }
}
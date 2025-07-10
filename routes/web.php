<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerProductController;
use App\Http\Controllers\HomePageController; // ⬅️ إضافة هذا الاستيراد

// استيراد متحكمات المدير
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductTypeController as AdminProductTypeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// مسارات عامة (للجميع: زائر، مشتري، بائع، مدير)
// ------------------------------------------------------------------------
Route::get('/', [HomePageController::class, 'index'])->name('welcome');

Route::get('/house',[HomePageController::class, 'house'])->name('house');
// مسارات تسجيل الدخول، التسجيل، إعادة تعيين كلمة المرور (مقدمة من Laravel UI)
Auth::routes();

// مسار لوحة التحكم الرئيسية بعد تسجيل الدخول
// HomeController لديه بالفعل middleware('auth') في constructor
Route::get('/home', [HomeController::class, 'index'])->name('home');

// مسارات عرض المنتجات والبحث (للزوار والمستخدمين المسجلين)
// فقط طرق العرض والتفاصيل مسموحة للجمهور
Route::resource('products', ProductController::class)->only(['index', 'show']);


// مسارات محمية (للمستخدمين المسجلين فقط - بغض النظر عن الدور)
// ------------------------------------------------------------------------
Route::middleware(['auth'])->group(function () {
    // مسارات الملف الشخصي
    // يتم عرض الملف الشخصي ونموذج التعديل من خلال دالة 'index'
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    // يتم تحديث الملف الشخصي بجميع حقوله (بما في ذلك كلمة المرور إذا تم إدخالها) من خلال دالة 'update'
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // أزيل المسار 'profile/password' لأنه يمكن إدارته ضمن 'profile.update'
});


// مسارات خاصة بالمشتري (يتطلب تسجيل الدخول ودور 'مستخدم عادي')
// ------------------------------------------------------------------------
Route::middleware(['auth', 'checkRole:مستخدم عادي'])->group(function () {
    // مسارات سلة التسوق
    Route::resource('cart', CartController::class)->except(['create', 'edit', 'show']);

    // مسارات الطلبات
    Route::resource('orders', OrderController::class)->except(['edit', 'update', 'create']);
    Route::post('orders/{order}/pay', [OrderController::class, 'processPayment'])->name('orders.pay');

    // مسارات تقييم المنتجات
    Route::resource('ratings', RatingController::class);

    // مسارات المفضلة (Wishlist) - تتطلب جدول Wishlists
    Route::resource('wishlist', WishlistController::class)->except(['create', 'show', 'edit', 'update']);
});


// مسارات خاصة بالبائع (يتطلب تسجيل الدخول ودور 'بائع')
// ------------------------------------------------------------------------
Route::middleware(['auth', 'checkRole:بائع'])->prefix('seller')->name('seller.')->group(function () {
    // مسارات إدارة منتجات البائع
    Route::resource('products', SellerProductController::class);
});


// مسارات خاصة بالمدير (يتطلب تسجيل الدخول ودور 'مدير')
// ------------------------------------------------------------------------
Route::middleware(['auth', 'checkRole:مدير'])->prefix('admin')->name('admin.')->group(function () {
    // لوحة تحكم المدير الرئيسية
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard'); // تم تصحيح method من index إلى dashboard كما في المتحكم

    // إدارة المنتجات من قبل المدير
    Route::resource('products', AdminProductController::class)->except(['create', 'store', 'edit']); // المدير يعرض ويحذف ويحدث الحالة فقط
    // مسار مخصص لتحديث حالة المنتج فقط
    Route::put('products/{product}/status', [AdminProductController::class, 'updateStatus'])->name('products.update_status');

    // إدارة المستخدمين من قبل المدير
    Route::resource('users', AdminUserController::class);

    // إدارة الطلبات من قبل المدير
    Route::resource('orders', AdminOrderController::class)->except(['create', 'store', 'edit']);

    // إدارة أنواع المنتجات من قبل المدير
    Route::resource('product-types', AdminProductTypeController::class);
});
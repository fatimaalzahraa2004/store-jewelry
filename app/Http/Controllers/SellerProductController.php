<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ProductResource;

class SellerProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole:بائع');
    }

    public function index()
    {
        $products = Auth::user()->products()->with('type')->get();
        return view('seller.products.index', compact('products'));
    }

    public function create()
    {
        $productTypes = ProductType::all();
        return view('seller.products.create', compact('productTypes'));
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $data['owner_user_id'] = Auth::id();
        $data['status'] = 'قيد التحقق';

        $albumPhotos = [];
        if ($request->hasFile('album_photos')) {
            foreach ($request->file('album_photos') as $photo) {
                if ($photo->isValid()) {
                    // 🔴🔴🔴 التعديل هنا 🔴🔴🔴
                    $path = $photo->store('products', 'public'); // تخزين في مجلد 'products' داخل قرص 'public'
                    $albumPhotos[] = $path;
                }
            }
        }
        $data['album_photos'] = $albumPhotos;

        $product = Product::create($data);
        return redirect()->route('seller.products.index')->with('success', 'تم إضافة المنتج بنجاح. سيتم مراجعته من قبل الإدارة.');
    }

    public function show(Product $product)
    {
        if ($product->owner_user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بعرض هذا المنتج.');
        }
        $product->load('type');
        return view('seller.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        if ($product->owner_user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بتعديل هذا المنتج.');
        }

        $productTypes = ProductType::all();
        return view('seller.products.edit', compact('product', 'productTypes'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();

        if ($request->hasFile('album_photos')) {
            // حذف الصور القديمة
            foreach ($product->album_photos as $oldPhotoPath) {
                // 🔴🔴🔴 التعديل هنا: استخدام قرص 'public' عند التحقق من وجود الملف وحذفه 🔴🔴🔴
                if (is_string($oldPhotoPath) && Storage::disk('public')->exists($oldPhotoPath)) {
                    Storage::disk('public')->delete($oldPhotoPath);
                }
            }
            $albumPhotos = [];
            foreach ($request->file('album_photos') as $photo) {
                if ($photo->isValid()) {
                    // 🔴🔴🔴 التعديل هنا 🔴🔴🔴
                    $path = $photo->store('products', 'public');
                    $albumPhotos[] = $path;
                }
            }
            $product->album_photos = $albumPhotos;
        }
        unset($data['album_photos']);

        $product->update($data);

        return redirect()->route('seller.products.index')->with('success', 'تم تحديث المنتج بنجاح.');
    }

    public function destroy(Product $product)
    {
        if ($product->owner_user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بحذف هذا المنتج.');
        }

        foreach ($product->album_photos as $photoPath) {
            // 🔴🔴🔴 التعديل هنا: استخدام قرص 'public' عند التحقق من وجود الملف وحذفه 🔴🔴🔴
            if (is_string($photoPath) && Storage::disk('public')->exists($photoPath)) {
                Storage::disk('public')->delete($photoPath);
            }
        }

        $product->delete();
        return redirect()->route('seller.products.index')->with('success', 'تم حذف المنتج بنجاح.');
    }
}
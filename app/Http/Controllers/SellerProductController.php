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
    /**
     * يجب أن يكون المستخدم بائعاً.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole:بائع'); // Middleware للتحقق من أن الدور بائع
    }

    /**
     * عرض قائمة بمنتجات البائع الحالية.
     */
    public function index()
    {
        $products = Auth::user()->products()->with('type')->get();

        // للـ API:
        // return ProductResource::collection($products);

        // للـ Web:
        return view('seller.products.index', compact('products'));
    }

    /**
     * عرض نموذج لإنشاء منتج جديد.
     */
    public function create()
    {
        $productTypes = ProductType::all();
        return view('seller.products.create', compact('productTypes'));
    }

    /**
     * تخزين منتج جديد تم إنشاؤه بواسطة البائع.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $data['owner_user_id'] = Auth::id(); // تعيين مالك المنتج تلقائياً
        $data['status'] = 'قيد التحقق'; // المنتجات الجديدة تكون "قيد التحقق"

        $albumPhotos = [];
        if ($request->hasFile('album_photos')) {
            foreach ($request->file('album_photos') as $photo) {
                $path = $photo->store('public/products'); // تخزين الصور في storage/app/public/products
                $albumPhotos[] = $path; // حفظ المسار الكامل للصورة
            }
        }
        $data['album_photos'] = $albumPhotos; // تخزينها كـ JSON في DB (بسبب casting in model)

        $product = Product::create($data);

        // للـ API:
        // return response()->json(['message' => 'تم إضافة المنتج بنجاح. سيتم مراجعته.', 'product' => new ProductResource($product)], 201);
        // للـ Web:
        return redirect()->route('seller.products.index')->with('success', 'تم إضافة المنتج بنجاح. سيتم مراجعته من قبل الإدارة.');
    }

    /**
     * عرض تفاصيل منتج معين يملكه البائع.
     */
    public function show(Product $product)
    {
        // تحقق من أن المنتج ملك للبائع الحالي
        if ($product->owner_user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بعرض هذا المنتج.');
        }
        $product->load('type'); // تحميل العلاقات

        // للـ API:
        // return new ProductResource($product);

        // للـ Web:
        return view('seller.products.show', compact('product'));
    }

    /**
     * عرض نموذج لتعديل منتج معين.
     */
    public function edit(Product $product)
    {
        // تحقق من أن المنتج ملك للبائع الحالي
        if ($product->owner_user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بتعديل هذا المنتج.');
        }

        $productTypes = ProductType::all();
        return view('seller.products.edit', compact('product', 'productTypes'));
    }

    /**
     * تحديث منتج معين بواسطة البائع.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // التحقق من الصلاحية يتم في UpdateProductRequest
        $data = $request->validated();

        if ($request->hasFile('album_photos')) {
            // حذف الصور القديمة إذا تم تحميل صور جديدة
            if ($product->album_photos) {
                foreach ($product->album_photos as $oldPhotoPath) {
                    Storage::delete($oldPhotoPath);
                }
            }
            $albumPhotos = [];
            foreach ($request->file('album_photos') as $photo) {
                $path = $photo->store('public/products');
                $albumPhotos[] = $path;
            }
            $data['album_photos'] = $albumPhotos;
        }

        $product->update($data);

        // بعد التحديث، يمكن إعادة تعيين الحالة إلى 'قيد التحقق' للمراجعة مرة أخرى إذا كانت التغييرات جوهرية
        // أو يمكنك إضافة منطق أكثر تعقيداً هنا
        // $product->status = 'قيد التحقق';
        // $product->save();

        // للـ API:
        // return response()->json(['message' => 'تم تحديث المنتج بنجاح.', 'product' => new ProductResource($product)]);
        // للـ Web:
        return redirect()->route('seller.products.index')->with('success', 'تم تحديث المنتج بنجاح.');
    }

    /**
     * حذف منتج معين بواسطة البائع.
     */
    public function destroy(Product $product)
    {
        // تحقق من أن المنتج ملك للبائع الحالي
        if ($product->owner_user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بحذف هذا المنتج.');
        }

        // حذف الصور المرتبطة بالمنتج من التخزين
        if ($product->album_photos) {
            foreach ($product->album_photos as $photoPath) {
                Storage::delete($photoPath);
            }
        }

        $product->delete();

        // للـ API:
        // return response()->json(['message' => 'تم حذف المنتج بنجاح.']);
        // للـ Web:
        return redirect()->route('seller.products.index')->with('success', 'تم حذف المنتج بنجاح.');
    }
}
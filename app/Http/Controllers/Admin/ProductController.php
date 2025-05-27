<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductType; // قد تحتاجها لعرض الفلاتر
use App\Http\Requests\Admin\UpdateProductStatusRequest; // لطلب تحديث الحالة
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * يجب أن يكون المستخدم مشرفاً.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole:مدير');
    }

    /**
     * عرض قائمة بجميع المنتجات (للمشرف).
     */
    public function index(Request $request)
    {
        $query = Product::with('type', 'owner');

        // يمكن إضافة فلاتر للمشرف (حسب الحالة، النوع، المالك، إلخ)
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
        if ($request->has('type_id')) {
            $query->where('type_id', $request->type_id);
        }

        $products = $query->paginate(15);

        // للـ API:
        // return ProductResource::collection($products);

        // للـ Web:
        $productTypes = ProductType::all();
        return view('admin.products.index', compact('products', 'productTypes'));
    }

    /**
     * عرض تفاصيل منتج معين (للمشرف).
     */
    public function show(Product $product)
    {
        $product->load('type', 'owner', 'ratings.user');

        // للـ API:
        // return new ProductResource($product);

        // للـ Web:
        return view('admin.products.show', compact('product'));
    }

    /**
     * تحديث حالة منتج معين (للمشرف).
     */
    public function updateStatus(UpdateProductStatusRequest $request, Product $product)
    {
        $product->status = $request->status;
        $product->save();

        // للـ API:
        // return response()->json(['message' => 'تم تحديث حالة المنتج بنجاح.', 'product' => new ProductResource($product)]);
        // للـ Web:
        return redirect()->back()->with('success', 'تم تحديث حالة المنتج بنجاح.');
    }

    /**
     * حذف منتج معين (للمشرف).
     */
    public function destroy(Product $product)
    {
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
        return redirect()->back()->with('success', 'تم حذف المنتج بنجاح.');
    }

    // المشرف قد لا يحتاج لعمليات create/store/edit/update بالمعنى الكامل للمنتج،
    // بل يركز على إدارة المنتجات الموجودة وتغيير حالتها.
    // إذا كان هناك حاجة لإنشاء منتجات "كمشرف"، فاستخدم SellerProductController كمرجع.
}
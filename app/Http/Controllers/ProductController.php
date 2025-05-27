<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType; // لفلترة الأنواع
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * عرض قائمة بجميع المنتجات (يمكن للزوار والمستخدمين رؤيتها).
     */
    public function index(Request $request)
    {
        $query = Product::with('type', 'owner'); // تحميل العلاقات

        // البحث حسب الصنف
        if ($request->has('type_id')) {
            $query->where('type_id', $request->type_id);
        }

        // البحث حسب السعر
        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // البحث حسب اسم المنتج
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('product_name', 'like', "%{$search}%")
                  ->orWhereHas('type', function ($q) use ($search) {
                      $q->where('type_name', 'like', "%{$search}%");
                  });
        }

        // عرض فقط المنتجات التي "تم الإضافة" أو "تم البيع" (وليس "قيد التحقق" أو "تم الرفض")
        $query->whereIn('status', ['تم الإضافة', 'تم البيع']);

        $products = $query->paginate(10); // تحديد عدد المنتجات في كل صفحة

        // للـ API يمكنك إرجاع Resource Collection:
        // return ProductResource::collection($products);

        // للـ Web، تمرير البيانات إلى الواجهة الأمامية
        $productTypes = ProductType::all(); // لجلب أنواع المنتجات لخيارات الفلترة
        return view('products.index', compact('products', 'productTypes'));
    }

    /**
     * عرض تفاصيل منتج معين.
     */
    public function show(Product $product)
    {
        // تأكد أن المنتج متاح للعرض (ليس قيد التحقق أو مرفوض)
        if (!in_array($product->status, ['تم الإضافة', 'تم البيع'])) {
            abort(404, 'المنتج غير متوفر للعرض.');
        }

        $product->load('type', 'owner', 'ratings.user'); // تحميل العلاقات الضرورية
        // للـ API يمكنك إرجاع ProductResource:
        // return new ProductResource($product);

        // للـ Web، تمرير البيانات إلى الواجهة الأمامية
        return view('products.show', compact('product'));
    }

    // بما أن هذا المتحكم هو للمشترين والزوار، فلا داعي لـ create, store, edit, update, destroy هنا.
    // هذه العمليات ستتم في SellerProductController و Admin\ProductController.
}
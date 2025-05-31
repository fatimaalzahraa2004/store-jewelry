<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use App\Http\Requests\Admin\StoreProductTypeRequest;
use App\Http\Requests\Admin\UpdateProductTypeRequest;
use Illuminate\Http\Request;
use App\Http\Resources\ProductTypeResource;

class ProductTypeController extends Controller
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
     * عرض قائمة بجميع أنواع المنتجات.
     */
    public function index()
    {
        $productTypes = ProductType::paginate(10);

        // للـ API:
        // return ProductTypeResource::collection($productTypes);

        // للـ Web:
        return view('admin.product_types.index', compact('productTypes'));
    }

    /**
     * عرض نموذج لإنشاء نوع منتج جديد.
     */
    public function create()
    {
        return view('admin.product_types.create');
    }

    /**
     * تخزين نوع منتج جديد.
     */
    public function store(StoreProductTypeRequest $request)
    {
        $productType = ProductType::create($request->validated());

        // للـ API:
        // return response()->json(['message' => 'تم إضافة نوع المنتج بنجاح.', 'product_type' => new ProductTypeResource($productType)], 201);
        // للـ Web:
        return redirect()->route('admin.product-types.index')->with('success', 'تم إضافة نوع المنتج بنجاح.');
    }

    /**
     * عرض تفاصيل نوع منتج معين.
     */
    public function show(ProductType $productType)
    {
        // للـ API:
        // return new ProductTypeResource($productType);

        // للـ Web:
        return view('admin.product_types.show', compact('productType'));
    }

    /**
     * عرض نموذج لتعديل نوع منتج معين.
     */
    public function edit(ProductType $productType)
    {
        return view('admin.product_types.edit', compact('productType'));
    }

    /**
     * تحديث نوع منتج معين.
     */
    public function update(UpdateProductTypeRequest $request, ProductType $productType)
    {
        $productType->update($request->validated());

        // للـ API:
        // return response()->json(['message' => 'تم تحديث نوع المنتج بنجاح.', 'product_type' => new ProductTypeResource($productType)]);
        // للـ Web:
        return redirect()->route('admin.product-types.index')->with('success', 'تم تحديث نوع المنتج بنجاح.');
    }

    /**
     * حذف نوع منتج معين.
     */
    public function destroy(ProductType $productType)
    {
        // يمكنك إضافة منطق للتحقق إذا كانت هناك منتجات مرتبطة بهذا النوع قبل الحذف
        // إذا كان هناك منتجات مرتبطة، فسيتم تعيين type_id إلى NULL بسبب onDelete('set null')
        $productType->delete();

        // للـ API:
        // return response()->json(['message' => 'تم حذف نوع المنتج بنجاح.']);
        // للـ Web:
        return redirect()->route('admin.product-types.index')->with('success', 'تم حذف نوع المنتج بنجاح.');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
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
     * عرض جميع الطلبات في النظام.
     */
    public function index(Request $request)
    {
        $query = Order::with('user', 'items.product.type');

        // يمكن إضافة فلاتر للمشرف (حسب الحالة، المستخدم، إلخ)
        if ($request->filled('status')) { // ⬅️ استخدام filled() هنا أيضاً للاتساق
            $query->where('status', $request->status);
        }
        if ($request->filled('user_id')) { // ⬅️ استخدام filled()
            $query->where('user_id', $request->user_id);
        }

        // 🔴🔴🔴 التعديل هنا: إضافة شرط الترتيب 🔴🔴🔴
        $query->orderBy('order_date', 'desc'); // ترتيب حسب تاريخ الطلب من الأحدث للأقدم
        // أو إذا أردت حسب رقم الطلب (المفتاح الأساسي)
        // $query->orderBy('id', 'desc'); // ترتيب حسب ID من الأكبر للأصغر

        $orders = $query->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * عرض تفاصيل طلب معين.
     */
    public function show(Order $order)
    {
        $order->load('user', 'items.product.type');
        return view('admin.orders.show', compact('order'));
    }

    /**
     * تحديث حالة طلب معين.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => ['required', 'in:جديد,تم الدفع,ملغي'],
        ]);

        $order->status = $request->status;
        $order->save();
        return redirect()->back()->with('success', 'تم تحديث حالة الطلب بنجاح.');
    }

    /**
     * حذف طلب (بواسطة المشرف).
     */
    public function destroy(Order $order)
    {
        $order->delete();
        // 🔴🔴🔴 التعديل هنا: إعادة التوجيه إلى صفحة قائمة الطلبات 🔴🔴🔴
        return redirect()->route('admin.orders.index')->with('success', 'تم حذف الطلب بنجاح.');
    }
}
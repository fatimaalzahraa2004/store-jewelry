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
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        $orders = $query->paginate(15);

        // للـ API:
        // return OrderResource::collection($orders);

        // للـ Web:
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * عرض تفاصيل طلب معين.
     */
    public function show(Order $order)
    {
        $order->load('user', 'items.product.type');

        // للـ API:
        // return new OrderResource($order);

        // للـ Web:
        return view('admin.orders.show', compact('order'));
    }

    /**
     * تحديث حالة طلب معين.
     * (مثلاً: من 'جديد' إلى 'تم الدفع' بعد التحقق اليدوي، أو 'ملغي')
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => ['required', 'in:جديد,تم الدفع,ملغي'],
        ]);

        $order->status = $request->status;
        $order->save();

        // للـ API:
        // return response()->json(['message' => 'تم تحديث حالة الطلب بنجاح.', 'order' => new OrderResource($order)]);
        // للـ Web:
        return redirect()->back()->with('success', 'تم تحديث حالة الطلب بنجاح.');
    }

    /**
     * حذف طلب (بواسطة المشرف).
     */
    public function destroy(Order $order)
    {
        $order->delete(); // سيتم حذف OrderItems المرتبطة تلقائياً بسبب onDelete('cascade')

        // للـ API:
        // return response()->json(['message' => 'تم حذف الطلب بنجاح.']);
        // للـ Web:
        return redirect()->back()->with('success', 'تم حذف الطلب بنجاح.');
    }
}
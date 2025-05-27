<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderItem;
use App\Http\Requests\StoreOrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    /**
     * يجب أن يكون المستخدم مسجلاً للدخول.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole:مستخدم عادي')->only(['index', 'store', 'show']);
    }

    /**
     * عرض جميع الطلبات الخاصة بالمستخدم الحالي.
     */
    public function index()
    {
        $orders = Auth::user()->orders()->with('items.product.type')->get();

        // للـ API:
        // return OrderResource::collection($orders);

        // للـ Web:
        return view('orders.index', compact('orders'));
    }

    /**
     * عرض تفاصيل طلب معين للمستخدم الحالي.
     */
    public function show(Order $order)
    {
        // تحقق من أن الطلب ملك للمستخدم الحالي
        if ($order->user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بعرض هذا الطلب.');
        }

        $order->load('items.product.type', 'user');

        // للـ API:
        // return new OrderResource($order);

        // للـ Web:
        return view('orders.show', compact('order'));
    }

    /**
     * إنشاء طلب جديد من محتويات سلة التسوق.
     * (يمثل عملية الشراء والدفع الإلكتروني)
     */
    public function store(StoreOrderRequest $request)
    {
        $user = Auth::user();
        $cartItems = $user->carts()->with('product')->get();

        if ($cartItems->isEmpty()) {
            // للـ API:
            // return response()->json(['message' => 'سلة التسوق فارغة.'], 400);
            // للـ Web:
            return redirect()->back()->with('error', 'لا يمكن إنشاء طلب، سلة التسوق فارغة.');
        }

        $totalPrice = $cartItems->sum('total_price');

        DB::beginTransaction();
        try {
            // إنشاء الطلب
            $order = Order::create([
                'user_id' => $user->id,
                'order_date' => now(),
                'total_price' => $totalPrice,
                'status' => 'جديد', // يمكن تغييرها إلى 'تم الدفع' بعد إتمام عملية الدفع الفعلية
            ]);

            // نقل عناصر السلة إلى عناصر الطلب
            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'total_price' => $cartItem->total_price,
                    'added_time' => $cartItem->added_time,
                ]);
            }

            // إفراغ سلة التسوق بعد إنشاء الطلب بنجاح
            $user->carts()->delete();

            DB::commit();

            // للـ API:
            // return response()->json(['message' => 'تم إنشاء الطلب بنجاح. سيتم توجيهك لصفحة الدفع.', 'order' => new OrderResource($order)], 201);
            // للـ Web:
            return redirect()->route('orders.show', $order->id)->with('success', 'تم إنشاء الطلب بنجاح. يرجى إتمام عملية الدفع.');

        } catch (\Exception $e) {
            DB::rollBack();
            // للـ API:
            // return response()->json(['message' => 'حدث خطأ أثناء إنشاء الطلب: ' . $e->getMessage()], 500);
            // للـ Web:
            return redirect()->back()->with('error', 'حدث خطأ أثناء إنشاء الطلب. يرجى المحاولة مرة أخرى.');
        }
    }

    /**
     * محاكاة عملية الدفع الإلكتروني.
     * (هذه مجرد دالة Dummy، في الواقع ستتفاعل مع بوابة دفع خارجية)
     */
    public function processPayment(Request $request, Order $order)
    {
        // تحقق من أن الطلب ملك للمستخدم الحالي وحالته 'جديد'
        if ($order->user_id !== Auth::id() || $order->status !== 'جديد') {
            abort(403, 'غير مصرح لك بمعالجة دفع هذا الطلب أو أن حالته لا تسمح بالدفع.');
        }

        // هنا يمكنك إضافة منطق الدفع الفعلي مع بوابة دفع (مثل Stripe, PayPal, إلخ)
        // بعد نجاح الدفع:
        $order->status = 'تم الدفع';
        $order->save();

        // للـ API:
        // return response()->json(['message' => 'تم الدفع بنجاح.', 'order' => new OrderResource($order)]);
        // للـ Web:
        return redirect()->route('orders.show', $order->id)->with('success', 'تم الدفع بنجاح. طلبك قيد المعالجة.');
    }
}
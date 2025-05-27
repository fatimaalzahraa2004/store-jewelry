<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Http\Requests\AddToCartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CartResource;

class CartController extends Controller
{
    /**
     * يجب أن يكون المستخدم مسجلاً للدخول لإدارة السلة.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole:مستخدم عادي')->only(['index', 'store', 'update', 'destroy']);
    }

    /**
     * عرض محتويات سلة التسوق للمستخدم الحالي.
     */
    public function index()
    {
        $cartItems = Auth::user()->carts()->with('product.type')->get();

        // للـ API:
        // return CartResource::collection($cartItems);

        // للـ Web:
        return view('cart.index', compact('cartItems'));
    }

    /**
     * إضافة منتج إلى سلة التسوق أو تحديث كميته.
     */
    public function store(AddToCartRequest $request)
    {
        $product = Product::findOrFail($request->product_id);
        $user = Auth::user();

        // حساب السعر الإجمالي للعنصر الواحد
        $itemTotalPrice = $product->price * $request->quantity;

        $cartItem = $user->carts()->where('product_id', $product->id)->first();

        if ($cartItem) {
            // تحديث الكمية والسعر الإجمالي إذا كان المنتج موجوداً بالفعل في السلة
            $cartItem->quantity += $request->quantity;
            $cartItem->total_price = $cartItem->quantity * $product->price;
            $cartItem->save();
            $message = 'تم تحديث كمية المنتج في سلة التسوق.';
        } else {
            // إضافة منتج جديد إلى السلة
            $cartItem = Cart::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'total_price' => $itemTotalPrice,
            ]);
            $message = 'تمت إضافة المنتج إلى سلة التسوق.';
        }

        // للـ API:
        // return response()->json(['message' => $message, 'cart_item' => new CartResource($cartItem)]);

        // للـ Web:
        return redirect()->back()->with('success', $message);
    }

    /**
     * تحديث كمية منتج معين في السلة.
     * (يمكن استخدام نفس طريقة Store إذا تم إرسال الكمية الجديدة بالكامل)
     */
    public function update(Request $request, Cart $cart)
    {
        // تحقق من أن السلة ملك للمستخدم الحالي
        if ($cart->user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بتعديل عنصر السلة هذا.');
        }

        $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $product = $cart->product; // جلب المنتج المرتبط
        if (!$product) {
            return redirect()->back()->with('error', 'المنتج غير موجود.');
        }

        $cart->quantity = $request->quantity;
        $cart->total_price = $request->quantity * $product->price;
        $cart->save();

        // للـ API:
        // return response()->json(['message' => 'تم تحديث كمية المنتج.', 'cart_item' => new CartResource($cart)]);

        // للـ Web:
        return redirect()->back()->with('success', 'تم تحديث كمية المنتج في السلة.');
    }

    /**
     * إزالة منتج من سلة التسوق.
     */
    public function destroy(Cart $cart)
    {
        // تحقق من أن السلة ملك للمستخدم الحالي
        if ($cart->user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بحذف عنصر السلة هذا.');
        }

        $cart->delete();

        // للـ API:
        // return response()->json(['message' => 'تمت إزالة المنتج من السلة.']);

        // للـ Web:
        return redirect()->back()->with('success', 'تمت إزالة المنتج من السلة بنجاح.');
    }
}
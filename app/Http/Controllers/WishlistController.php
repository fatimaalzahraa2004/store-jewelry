<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist; // افترض أنك أنشأت هذا النموذج والجدول

class WishlistController extends Controller
{
    /**
     * يجب أن يكون المستخدم مسجلاً للدخول.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole:مستخدم عادي')->only(['index', 'store', 'destroy']);
    }

    /**
     * عرض قائمة المفضلة للمستخدم الحالي.
     */
    public function index()
    {
        // افترض أنك أضفت علاقة 'wishlists' إلى نموذج User
        $wishlistItems = Auth::user()->wishlists()->with('product.type')->get();

        // للـ API:
        // return WishlistResource::collection($wishlistItems); // ستحتاج لإنشاء WishlistResource

        // للـ Web:
        return view('wishlist.index', compact('wishlistItems'));
    }

    /**
     * إضافة منتج إلى قائمة المفضلة.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
        ]);

        $user = Auth::user();
        $product = Product::findOrFail($request->product_id);

        // التحقق مما إذا كان المنتج موجوداً بالفعل في المفضلة
        $existing = Wishlist::where('user_id', $user->id)
                            ->where('product_id', $product->id)
                            ->first();

        if ($existing) {
            // للـ API:
            // return response()->json(['message' => 'المنتج موجود بالفعل في قائمة المفضلة.'], 409);
            // للـ Web:
            return redirect()->back()->with('info', 'المنتج موجود بالفعل في قائمة المفضلة.');
        }

        Wishlist::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);

        // للـ API:
        // return response()->json(['message' => 'تمت إضافة المنتج إلى قائمة المفضلة بنجاح.'], 201);
        // للـ Web:
        return redirect()->back()->with('success', 'تمت إضافة المنتج إلى قائمة المفضلة بنجاح.');
    }

    /**
     * إزالة منتج من قائمة المفضلة.
     */
    public function destroy(Wishlist $wishlist)
    {
        // تحقق من أن عنصر المفضلة ملك للمستخدم الحالي
        if ($wishlist->user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بحذف عنصر المفضلة هذا.');
        }

        $wishlist->delete();

        // للـ API:
        // return response()->json(['message' => 'تمت إزالة المنتج من قائمة المفضلة.']);
        // للـ Web:
        return redirect()->back()->with('success', 'تمت إزالة المنتج من قائمة المفضلة بنجاح.');
    }
}
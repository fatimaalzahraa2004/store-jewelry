<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Product;
use App\Http\Requests\StoreRatingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\RatingResource;

class RatingController extends Controller
{
    /**
     * يجب أن يكون المستخدم مسجلاً للدخول.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole:مستخدم عادي')->only(['store', 'update', 'destroy']);
    }

    /**
     * إضافة تقييم جديد لمنتج.
     * أو تحديث تقييم موجود.
     */
    public function store(StoreRatingRequest $request)
    {
        $user = Auth::user();
        $product = Product::findOrFail($request->product_id);

        // التحقق إذا كان المستخدم قد اشترى هذا المنتج بالفعل
        // هذه خطوة مهمة لضمان أن التقييمات تأتي من مشترين حقيقيين
        $hasPurchased = $user->orders()->whereHas('items', function ($query) use ($product) {
            $query->where('product_id', $product->id);
        })->exists();

        if (!$hasPurchased) {
            // للـ API:
            // return response()->json(['message' => 'لا يمكنك تقييم منتج لم تقم بشرائه.'], 403);
            // للـ Web:
            return redirect()->back()->with('error', 'لا يمكنك تقييم منتج لم تقم بشرائه.');
        }

        // البحث عن تقييم موجود لهذا المستخدم وللمنتج
        $rating = Rating::where('user_id', $user->id)
                        ->where('product_id', $product->id)
                        ->first();

        if ($rating) {
            // تحديث التقييم الموجود
            $rating->rating_value = $request->rating_value;
            $rating->comment = $request->comment;
            $rating->save();
            $message = 'تم تحديث تقييمك بنجاح.';
        } else {
            // إنشاء تقييم جديد
            $rating = Rating::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'rating_value' => $request->rating_value,
                'comment' => $request->comment,
            ]);
            $message = 'تم إضافة تقييمك بنجاح.';
        }

        // تحديث متوسط التقييم للمنتج
        $this->updateProductAverageRating($product);

        // للـ API:
        // return response()->json(['message' => $message, 'rating' => new RatingResource($rating)], $rating->wasRecentlyCreated ? 201 : 200);
        // للـ Web:
        return redirect()->back()->with('success', $message);
    }

    /**
     * تحديث متوسط التقييم لمنتج معين.
     * (دالة مساعدة)
     */
    protected function updateProductAverageRating(Product $product)
    {
        $averageRating = $product->ratings()->avg('rating_value');
        $product->rating = round($averageRating, 1); // تقريب لأقرب رقم عشري
        $product->save();
    }

    /**
     * يمكن للمستخدم حذف تقييمه الخاص.
     */
    public function destroy(Rating $rating)
    {
        if ($rating->user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بحذف هذا التقييم.');
        }

        $product = $rating->product; // حفظ المنتج قبل حذف التقييم

        $rating->delete();
        $this->updateProductAverageRating($product); // إعادة حساب متوسط التقييم

        // للـ API:
        // return response()->json(['message' => 'تم حذف التقييم بنجاح.']);
        // للـ Web:
        return redirect()->back()->with('success', 'تم حذف التقييم بنجاح.');
    }
}
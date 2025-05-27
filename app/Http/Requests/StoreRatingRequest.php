<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRatingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check(); // فقط المستخدمون المسجلون يمكنهم التقييم
    }

    public function rules(): array
    {
        return [
            'product_id' => ['required', 'exists:products,id'],
            'rating_value' => ['required', 'numeric', 'min:0.5', 'max:5.0'], // تقييم من 0.5 إلى 5
            'comment' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'معرف المنتج مطلوب للتقييم.',
            'product_id.exists' => 'المنتج الذي تحاول تقييمه غير موجود.',
            'rating_value.required' => 'قيمة التقييم مطلوبة.',
            'rating_value.numeric' => 'قيمة التقييم يجب أن تكون رقماً.',
            'rating_value.min' => 'قيمة التقييم يجب أن تكون 0.5 على الأقل.',
            'rating_value.max' => 'قيمة التقييم القصوى هي 5.0.',
            'comment.max' => 'يجب ألا يتجاوز التعليق 1000 حرف.',
        ];
    }
}
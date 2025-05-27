<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProductStatusRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مخولاً لتقديم هذا الطلب.
     */
    public function authorize(): bool
    {
        // فقط المشرفون يمكنهم تغيير حالة المنتج
        return Auth::check() && Auth::user()->isAdmin();
    }

    /**
     * الحصول على قواعد التحقق التي تنطبق على الطلب.
     */
    public function rules(): array
    {
        return [
            'status' => ['required', 'in:قيد التحقق,تم الإضافة,تم الرفض,تم البيع'],
        ];
    }

    /**
     * الحصول على رسائل الخطأ المخصصة لقواعد التحقق.
     */
    public function messages(): array
    {
        return [
            'status.required' => 'حالة المنتج مطلوبة.',
            'status.in' => 'حالة المنتج المحددة غير صالحة.',
        ];
    }
}
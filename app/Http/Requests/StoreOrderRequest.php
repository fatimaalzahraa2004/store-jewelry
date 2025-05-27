<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreOrderRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مخولاً لتقديم هذا الطلب.
     */
    public function authorize(): bool
    {
        // فقط المستخدمون المسجلون (المشترون) يمكنهم إنشاء طلب
        return Auth::check() && Auth::user()->isBuyer();
    }

    /**
     * الحصول على قواعد التحقق التي تنطبق على الطلب.
     */
    public function rules(): array
    {
        return [
            // لا يتلقى هذا الطلب أي بيانات مباشرة، بل يعتمد على محتوى السلة.
            // يمكن إضافة قواعد لتحقق من معلومات الدفع أو الشحن إذا كانت تُرسل هنا.
            // مثلاً:
            // 'payment_method' => ['required', 'string', 'in:credit_card,paypal'],
            // 'shipping_address_id' => ['required', 'exists:shipping_addresses,id'],
        ];
    }

    /**
     * الحصول على رسائل الخطأ المخصصة لقواعد التحقق.
     */
    public function messages(): array
    {
        return [
            // رسائل لرسائل الخطأ المخصصة
        ];
    }
}
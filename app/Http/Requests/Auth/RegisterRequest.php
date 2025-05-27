<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مخولاً لتقديم هذا الطلب.
     */
    public function authorize(): bool
    {
        // الجميع مخول لإنشاء حساب
        return true;
    }

    /**
     * الحصول على قواعد التحقق التي تنطبق على الطلب.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', 'in:ذكر,أنثى'],
            'birth_date' => ['nullable', 'date', 'before_or_equal:' . now()->subYears(13)->format('Y-m-d')], // يجب أن يكون عمره 13 سنة على الأقل
            'role' => ['nullable', 'in:مستخدم عادي,بائع'], // يمكن للمستخدم أن يختار أن يكون بائعاً أو مستخدم عادي، المدير يتم تعيينه يدوياً
        ];
    }

    /**
     * الحصول على رسائل الخطأ المخصصة لقواعد التحقق.
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'الاسم الأول مطلوب.',
            'last_name.required' => 'الاسم الأخير مطلوب.',
            'username.required' => 'اسم المستخدم مطلوب.',
            'username.unique' => 'اسم المستخدم هذا مستخدم بالفعل.',
            'email.required' => 'البريد الإلكتروني مطلوب.',
            'email.email' => 'البريد الإلكتروني يجب أن يكون صالحًا.',
            'email.unique' => 'البريد الإلكتروني هذا مستخدم بالفعل.',
            'password.required' => 'كلمة المرور مطلوبة.',
            'password.min' => 'يجب أن تتكون كلمة المرور من 8 أحرف على الأقل.',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق.',
            'gender.required' => 'النوع مطلوب.',
            'gender.in' => 'النوع يجب أن يكون ذكر أو أنثى.',
            'birth_date.date' => 'تاريخ الميلاد يجب أن يكون تاريخاً صالحاً.',
            'birth_date.before_or_equal' => 'يجب أن يكون عمرك 13 عاماً على الأقل للتسجيل.',
            'role.in' => 'الدور المحدد غير صالح.',
        ];
    }
}
<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مخولاً لتقديم هذا الطلب.
     */
    public function authorize(): bool
    {
        // فقط المشرفون يمكنهم تحديث بيانات المستخدمين
        return Auth::check() && Auth::user()->isAdmin();
    }

    /**
     * الحصول على قواعد التحقق التي تنطبق على الطلب.
     */
    public function rules(): array
    {
        $userId = $this->route('user'); // افتراض أن الـ route parameter هو 'user'
        return [
            'first_name' => ['sometimes', 'required', 'string', 'max:255'],
            'last_name' => ['sometimes', 'required', 'string', 'max:255'],
            'username' => ['sometimes', 'required', 'string', 'max:255', Rule::unique('users')->ignore($userId)],
            'email' => ['sometimes', 'required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($userId)],
            'gender' => ['sometimes', 'required', 'in:ذكر,أنثى'],
            'birth_date' => ['nullable', 'date', 'before_or_equal:' . now()->subYears(13)->format('Y-m-d')],
            'role' => ['sometimes', 'required', 'in:مدير,مستخدم عادي,بائع'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'], // يمكن تغيير كلمة المرور اختياريا
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
            'gender.required' => 'النوع مطلوب.',
            'gender.in' => 'النوع يجب أن يكون ذكر أو أنثى.',
            'birth_date.date' => 'تاريخ الميلاد يجب أن يكون تاريخاً صالحاً.',
            'birth_date.before_or_equal' => 'يجب أن يكون عمر المستخدم 13 عاماً على الأقل.',
            'role.required' => 'الدور مطلوب.',
            'role.in' => 'الدور المحدد غير صالح.',
            'password.min' => 'يجب أن تتكون كلمة المرور من 8 أحرف على الأقل.',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق.',
        ];
    }
}
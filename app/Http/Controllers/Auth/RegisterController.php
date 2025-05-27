<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\RegisterRequest; // استخدام الـ Request الجديد

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * أين يتم توجيه المستخدمين بعد التسجيل.
     *
     * @var string
     */
    protected $redirectTo = '/home'; // سيتم توجيههم لاحقًا بواسطة HomeController

    /**
     * إنشاء مثيل متحكم جديد.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * معالجة التسجيل بعد التحقق من الصحة باستخدام RegisterRequest.
     *
     * @param  \App\Http\Requests\Auth\RegisterRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterRequest $request)
    {
        $user = $this->create($request->validated());

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }

    /**
     * إنشاء مثيل مستخدم جديد بعد تسجيل صالح.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'birth_date' => $data['birth_date'] ?? null, // يمكن أن تكون null
            'role' => $data['role'] ?? 'مستخدم عادي', // إذا لم يتم تحديد الدور، يكون 'مستخدم عادي'
        ]);
    }

    // قم بإزالة دالة validator(array $data) لأننا سنستخدم RegisterRequest
    // ملاحظة: قد تحتاج إلى تحديث قالب register.blade.php ليتناسب مع حقول first_name, last_name, username, gender, birth_date, role
}
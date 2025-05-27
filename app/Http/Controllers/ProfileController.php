<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Http\Resources\UserResource;

class ProfileController extends Controller
{
    /**
     * يجب أن يكون المستخدم مسجلاً للدخول.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * عرض صفحة الملف الشخصي للمستخدم.
     */
    public function index()
    {
        $user = Auth::user();
        // للـ API:
        // return new UserResource($user);
        // للـ Web:
        return view('profile.index', compact('user'));
    }

    /**
     * تحديث معلومات الملف الشخصي للمستخدم.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'gender' => ['required', 'in:ذكر,أنثى'],
            'birth_date' => ['nullable', 'date', 'before_or_equal:' . now()->subYears(13)->format('Y-m-d')],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->birth_date = $request->birth_date;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // للـ API:
        // return response()->json(['message' => 'تم تحديث الملف الشخصي بنجاح.', 'user' => new UserResource($user)]);
        // للـ Web:
        return redirect()->back()->with('success', 'تم تحديث الملف الشخصي بنجاح.');
    }
}
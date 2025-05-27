<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\UpdateUserRequest; // لطلب تحديث المستخدم
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * يجب أن يكون المستخدم مشرفاً.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole:مدير');
    }

    /**
     * عرض قائمة بجميع المستخدمين.
     */
    public function index()
    {
        $users = User::paginate(15);

        // للـ API:
        // return UserResource::collection($users);

        // للـ Web:
        return view('admin.users.index', compact('users'));
    }

    /**
     * عرض تفاصيل مستخدم معين.
     */
    public function show(User $user)
    {
        // للـ API:
        // return new UserResource($user);

        // للـ Web:
        return view('admin.users.show', compact('user'));
    }

    /**
     * عرض نموذج لتعديل مستخدم.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * تحديث معلومات مستخدم.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']); // لا تحدث كلمة المرور إذا كانت فارغة
        }

        $user->update($data);

        // للـ API:
        // return response()->json(['message' => 'تم تحديث بيانات المستخدم بنجاح.', 'user' => new UserResource($user)]);
        // للـ Web:
        return redirect()->route('admin.users.index')->with('success', 'تم تحديث بيانات المستخدم بنجاح.');
    }

    /**
     * حذف مستخدم.
     */
    public function destroy(User $user)
    {
        // منع المشرف من حذف نفسه أو المشرفين الآخرين
        if ($user->id === Auth::id() || $user->isAdmin()) {
            // للـ API:
            // return response()->json(['message' => 'لا يمكنك حذف هذا المستخدم.'], 403);
            // للـ Web:
            return redirect()->back()->with('error', 'لا يمكنك حذف هذا المستخدم (إما أنه مشرف أو أنت تحاول حذف حسابك).');
        }

        $user->delete();

        // للـ API:
        // return response()->json(['message' => 'تم حذف المستخدم بنجاح.']);
        // للـ Web:
        return redirect()->back()->with('success', 'تم حذف المستخدم بنجاح.');
    }
}
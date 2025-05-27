<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * معالجة طلب وارد.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            abort(401, 'غير مصرح لك بالوصول.'); // Unauthorized
        }

        $user = Auth::user();

        // التحقق مما إذا كان دور المستخدم يتطابق مع أحد الأدوار المطلوبة
        foreach ($roles as $role) {
            if ($user->role === $role) {
                return $next($request);
            }
        }

        abort(403, 'ليس لديك الصلاحيات اللازمة للوصول إلى هذه الصفحة.'); // Forbidden
    }
}
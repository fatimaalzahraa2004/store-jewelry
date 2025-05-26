<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).




**ملاحظة هامة:** سأفترض أن لديك بيئة Laravel جاهزة (مشروع جديد) وأنك قمت بتثبيت Composer و Node.js.

---

### أولاً: إنشاء واجهة تسجيل دخول جذابة باستخدام Laravel UI Kit

لجعل الواجهة جذابة وأنيقة، سنستخدم Bootstrap كواجهة أمامية ونقوم ببعض التوجيهات لتحسين المظهر.

1.  **تثبيت حزمة Laravel UI:**
    إذا لم تكن قد قمت بذلك بالفعل في مشروعك الجديد، ابدأ بتثبيت حزمة `laravel/ui` عبر Composer:

    ```bash
    composer require laravel/ui
    ```

2.  **توليد واجهات Bootstrap مع Authentication:**
    بعد تثبيت الحزمة، قم بتوليد ملفات الـ scaffolding الخاصة بـ Bootstrap مع نظام المصادقة (تسجيل الدخول والتسجيل) المدمج:

    ```bash
    php artisan ui bootstrap --auth
    ```
    عند تنفيذ هذا الأمر، سيطلب منك تثبيت حزم npm. وافق على ذلك.

3.  **تثبيت حزم Node.js وتجميع الواجهة الأمامية:**
    انتقل إلى مجلد مشروعك في الطرفية وقم بتثبيت تبعيات Node.js، ثم قم بتجميع ملفات الأصول (CSS و JavaScript):

    ```bash
    npm install
    npm run dev
    # أو npm run build للإنتاج
    ```
    هذا سيقوم بتجميع ملفات Bootstrap ووضعها في مجلد `public/css/app.css` و `public/js/app.js`.

4.  **جعل الواجهة جذابة وأنيقة (توجيهات):**
    الآن، لنجعل الواجهة "جذابة وأنيقة وجميلة"، هذا يعتمد بشكل كبير على التخصيص اليدوي لملفات الـ CSS و Blade:

    *   **استخدام ثيم Bootstrap مخصص:**
        *   يمكنك استعراض ثيمات Bootstrap جاهزة من مواقع مثل [Bootswatch](https://bootswatch.com/) أو [Start Bootstrap](https://startbootstrap.com/).
        *   قم بتنزيل ملف الـ CSS الخاص بالثيم الذي يعجبك واستبدل محتواه بملف `resources/sass/app.scss` (أو قم باستيراده داخله).
        *   بعد التعديل على `app.scss`، أعد تشغيل `npm run dev` لتجميع التغييرات.

    *   **تخصيص Blade Views:**
        *   الواجهات الافتراضية لـ Laravel UI موجودة في `resources/views/auth/` (مثل `login.blade.php`, `register.blade.php`).
        *   افتح هذه الملفات وقم بتعديل تصميمها باستخدام كلاسات Bootstrap لتناسب ذوقك. على سبيل المثال:
            *   إضافة صورة خلفية للعنصر `<body>` أو لـ `<div>` الذي يحتوي على الفورم.
            *   استخدام كروت (cards) Bootstrap بتصميم مختلف.
            *   تغيير الألوان والخطوط باستخدام CSS مخصص في `resources/css/app.css` أو داخل وسم `<style>` في ملف الـ Blade نفسه (للتخصيص السريع).
            *   إضافة أيقونات (مثل Font Awesome) لإضفاء لمسة احترافية.
        *   **مثال بسيط للتعديل في `login.blade.php` لجعلها أجمل:**
            ```html
            {{-- في resources/views/auth/login.blade.php --}}
            @extends('layouts.app') {{-- تأكد أن هذا يورث من تصميم أساسي --}}

            @section('content')
            <div class="container d-flex justify-content-center align-items-center min-vh-100" style="background-image: url('{{ asset('images/jewelry_bg.jpg') }}'); background-size: cover;">
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-lg border-0 rounded-lg mt-5 bg-white bg-opacity-90">
                        <div class="card-header bg-dark text-white text-center py-4">
                            <h3 class="font-weight-light my-2">{{ __('تسجيل الدخول') }}</h3>
                        </div>
                        <div class="card-body p-4">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="form-label text-md-end">{{ __('البريد الإلكتروني') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label text-md-end">{{ __('كلمة المرور') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('تذكرني') }}
                                    </label>
                                </div>

                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('هل نسيت كلمة المرور؟') }}
                                        </a>
                                    @endif
                                    <button type="submit" class="btn btn-primary px-4 py-2">
                                        {{ __('تسجيل الدخول') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small"><a href="{{ route('register') }}">ليس لديك حساب؟ قم بإنشاء حساب!</a></div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
            ```
            **ملاحظة حول `images/jewelry_bg.jpg`:** هذا يفترض أن لديك صورة خلفية بهذا الاسم في مجلد `public/images/`.

---

### ثانياً: إنشاء جميع المتحكمات (Controllers) الخاصة بالموقع

سنقوم بإنشاء المتحكمات بناءً على الوظائف الرئيسية والأدوار (مشتري، بائع، وإدارة داخلية إن وجدت):

1.  **المتحكمات العامة (للزائر والمشتري والبائع):**
    *   **`HomeController`**: للصفحة الرئيسية.
        ```bash
        php artisan make:controller HomeController
        ```
    *   **`ProductController`**: لعرض المنتجات، البحث عنها، وتفاصيل المنتج (سيستخدمها الزوار والمشترين).
        ```bash
        php artisan make:controller ProductController --resource
        ```
        (استخدم `--resource` لتوليد طرق CRUD جاهزة).
    *   **`Auth` Controllers**: (مثل `LoginController`, `RegisterController`, `ForgotPasswordController`, `ResetPasswordController`, `VerificationController`) تم توليدها تلقائياً مع `php artisan ui bootstrap --auth`.

2.  **المتحكمات الخاصة بالمشتري (`Buyer`):**
    *   **`CartController`**: لإدارة سلة التسوق (إضافة، تحديث، حذف عناصر).
        ```bash
        php artisan make:controller CartController --resource
        ```
    *   **`OrderController`**: لإدارة الطلبات (إنشاء طلب، عرض الطلبات).
        ```bash
        php artisan make:controller OrderController --resource
        ```
    *   **`RatingController`**: لإضافة وتقييم المنتجات.
        ```bash
        php artisan make:controller RatingController --resource
        ```
    *   **`WishlistController`**: لإدارة قائمة المفضلة (إذا قررت إضافة جدول `wishlists` في المستقبل، لأنه غير موجود حالياً في الـ DB).
        ```bash
        php artisan make:controller WishlistController --resource
        ```
        (حاليًا، يمكن أن يكون هذا مجرد placeholder، أو يمكن دمج وظيفة الإضافة للمفضلة في `ProductController` كطريقة `addProductToFavorites` إذا لم يكن هناك جدول مخصص.)
    *   **`ProfileController`**: لإدارة ملفات المستخدمين (تحديث المعلومات الشخصية).
        ```bash
        php artisan make:controller ProfileController
        ```

3.  **المتحكمات الخاصة بالبائع (`Seller`):**
    *   **`SellerProductController`**: لإدارة المنتجات الخاصة بالبائع (عرض، إضافة، تعديل، حذف منتجاته، تحديد السعر، رفع الشهادات).
        ```bash
        php artisan make:controller SellerProductController --resource
        ```
        (هذا المتحكم سيتعامل مع الـ `status` للمنتج مثل "قيد التحقق"، "تم الإضافة"، "تم الرفض".)

4.  **المتحكمات الإدارية (`Admin` - إذا كان لديك دور مشرف):**
    *   **`AdminController`**: لوحة التحكم العامة للمشرف.
        ```bash
        php artisan make:controller AdminController
        ```
    *   **`Admin\ProductController`**: لإدارة جميع المنتجات في النظام (مثل تغيير حالة المنتج `status` بعد التحقق).
        ```bash
        php artisan make:controller Admin\\ProductController --resource
        ```
        (سيتم وضع هذا المتحكم في مجلد `app/Http/Controllers/Admin/`)
    *   **`Admin\UserController`**: لإدارة المستخدمين (البائعين والمشترين).
        ```bash
        php artisan make:controller Admin\\UserController --resource
        ```
    *   **`Admin\OrderController`**: لمراجعة الطلبات والتحقق من حالتها.
        ```bash
        php artisan make:controller Admin\\OrderController --resource
        ```
    *   **`Admin\ProductTypeController`**: لإدارة أنواع المنتجات (إضافة/تعديل/حذف الأصناف).
        ```bash
        php artisan make:controller Admin\\ProductTypeController --resource
        ```

**ملخص الأوامر لإنشاء المتحكمات:**

```bash
# General Controllers
php artisan make:controller HomeController
php artisan make:controller ProductController --resource

# Buyer-specific Controllers
php artisan make:controller CartController --resource
php artisan make:controller OrderController --resource
php artisan make:controller RatingController --resource
php artisan make:controller WishlistController --resource # If you add a wishlists table
php artisan make:controller ProfileController

# Seller-specific Controllers
php artisan make:controller SellerProductController --resource

# Admin Controllers (assuming an 'Admin' namespace/folder for organization)
php artisan make:controller AdminController
php artisan make:controller Admin\\ProductController --resource
php artisan make:controller Admin\\UserController --resource
php artisan make:controller Admin\\OrderController --resource
php artisan make:controller Admin\\ProductTypeController --resource
```

---

### ثالثاً: إنشاء التعليمات الكاملة من أجل إنشاء Requests

الـ Requests تُستخدم للتحقق من صحة البيانات المرسلة من المستخدمين قبل معالجتها في المتحكمات.

1.  **Requests العامة:**
    *   `Auth\LoginRequest` (موجود بالفعل من Laravel UI).
    *   `Auth\RegisterRequest` (موجود بالفعل من Laravel UI).

2.  **Requests الخاصة بالمنتجات:**
    *   **`StoreProductRequest`**: للتحقق من البيانات عند إضافة منتج جديد بواسطة البائع.
        ```bash
        php artisan make:request StoreProductRequest
        ```
        *مثال على المحتوى (`app/Http/Requests/StoreProductRequest.php`):*
        ```php
        <?php

        namespace App\Http\Requests;

        use Illuminate\Foundation\Http\FormRequest;
        use Illuminate\Support\Facades\Auth;

        class StoreProductRequest extends FormRequest
        {
            /**
             * Determine if the user is authorized to make this request.
             */
            public function authorize(): bool
            {
                // فقط البائعون المصرح لهم يمكنهم إضافة منتجات
                return Auth::check() && Auth::user()->role === 'seller'; // افترض وجود حقل 'role' في جدول 'users'
            }

            /**
             * Get the validation rules that apply to the request.
             *
             * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
             */
            public function rules(): array
            {
                return [
                    'product_name' => ['required', 'string', 'max:255'],
                    'price' => ['required', 'numeric', 'min:0.01'],
                    'type_id' => ['required', 'exists:product_types,id'],
                    'album_photos.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // For multiple photos
                    'shape' => ['nullable', 'string', 'max:255'],
                    'weight' => ['nullable', 'numeric', 'min:0'],
                    // 'owner_user_id' will be set by the controller based on authenticated user
                ];
            }

            public function messages(): array
            {
                return [
                    'product_name.required' => 'اسم المنتج مطلوب.',
                    'price.required' => 'سعر المنتج مطلوب.',
                    'price.numeric' => 'السعر يجب أن يكون رقماً.',
                    'price.min' => 'السعر يجب أن يكون أكبر من صفر.',
                    'type_id.required' => 'نوع المنتج مطلوب.',
                    'type_id.exists' => 'نوع المنتج المحدد غير صالح.',
                    'album_photos.*.image' => 'يجب أن تكون الصور من نوع صورة.',
                    'album_photos.*.mimes' => 'صيغ الصور المدعومة هي: jpeg, png, jpg, gif.',
                    'album_photos.*.max' => 'حجم الصورة لا يجب أن يتجاوز 2 ميجابايت.',
                    'weight.numeric' => 'الوزن يجب أن يكون رقماً.',
                    'weight.min' => 'الوزن يجب أن يكون موجباً.',
                ];
            }
        }
        ```
    *   **`UpdateProductRequest`**: للتحقق من البيانات عند تحديث منتج موجود.
        ```bash
        php artisan make:request UpdateProductRequest
        ```
        (محتواها سيكون مشابهاً لـ `StoreProductRequest` مع إضافة قاعدة `sometimes` للحقول الاختيارية).

3.  **Requests الخاصة بسلة التسوق والطلبات:**
    *   **`AddToCartRequest`**: للتحقق عند إضافة منتج إلى السلة.
        ```bash
        php artisan make:request AddToCartRequest
        ```
        *مثال على المحتوى:*
        ```php
        <?php

        namespace App\Http\Requests;

        use Illuminate\Foundation\Http\FormRequest;
        use Illuminate\Support\Facades\Auth;

        class AddToCartRequest extends FormRequest
        {
            public function authorize(): bool
            {
                return Auth::check();
            }

            public function rules(): array
            {
                return [
                    'product_id' => ['required', 'exists:products,id'],
                    'quantity' => ['required', 'integer', 'min:1'],
                ];
            }

            public function messages(): array
            {
                return [
                    'product_id.required' => 'معرف المنتج مطلوب.',
                    'product_id.exists' => 'المنتج المحدد غير موجود.',
                    'quantity.required' => 'الكمية مطلوبة.',
                    'quantity.integer' => 'الكمية يجب أن تكون عدداً صحيحاً.',
                    'quantity.min' => 'الكمية يجب أن تكون 1 على الأقل.',
                ];
            }
        }
        ```
    *   **`StoreOrderRequest`**: للتحقق عند إتمام عملية الشراء.
        ```bash
        php artisan make:request StoreOrderRequest
        ```
        (هذا قد يتضمن تفاصيل الدفع والعنوان إذا لم تكن موجودة في مكان آخر).

4.  **Requests الخاصة بالتقييمات:**
    *   **`StoreRatingRequest`**: للتحقق عند إضافة تقييم جديد.
        ```bash
        php artisan make:request StoreRatingRequest
        ```
        *مثال على المحتوى:*
        ```php
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
        ```

5.  **Requests الإدارية (للمشرف):**
    *   **`Admin\UpdateProductStatusRequest`**: لتغيير حالة المنتج (قيد التحقق، تم الرفض، إلخ).
        ```bash
        php artisan make:request Admin\\UpdateProductStatusRequest
        ```
        (سيتم وضع هذا الـ Request في مجلد `app/Http/Requests/Admin/`)
    *   **`Admin\StoreProductTypeRequest`**: لإضافة نوع منتج جديد.
        ```bash
        php artisan make:request Admin\\StoreProductTypeRequest
        ```
    *   **`Admin\UpdateProductTypeRequest`**: لتعديل نوع منتج.
        ```bash
        php artisan make:request Admin\\UpdateProductTypeRequest
        ```
    *   `Admin\UpdateUserRequest` (لتعديل دور المستخدمين مثلاً).

**ملخص الأوامر لإنشاء Requests:**

```bash
# Product related requests
php artisan make:request StoreProductRequest
php artisan make:request UpdateProductRequest

# Cart & Order related requests
php artisan make:request AddToCartRequest
php artisan make:request StoreOrderRequest

# Rating related requests
php artisan make:request StoreRatingRequest

# Admin related requests
php artisan make:request Admin\\UpdateProductStatusRequest
php artisan make:request Admin\\StoreProductTypeRequest
php artisan make:request Admin\\UpdateProductTypeRequest
# Add more as needed for other admin functionalities (e.g., UpdateUserRequest)
```

---

### رابعاً: إنشاء التعليمات الكاملة من أجل إنشاء Resources

الـ Resources تُستخدم لتحويل نماذج Eloquent إلى مصفوفات JSON بشكل أنيق، خاصة عند بناء API.

1.  **Resources العامة:**
    *   **`UserResource`**: لتحويل بيانات المستخدم.
        ```bash
        php artisan make:resource UserResource
        ```
        *مثال على المحتوى (`app/Http/Resources/UserResource.php`):*
        ```php
        <?php

        namespace App\Http\Resources;

        use Illuminate\Http\Request;
        use Illuminate\Http\Resources\Json\JsonResource;

        class UserResource extends JsonResource
        {
            /**
             * Transform the resource into an array.
             *
             * @return array<string, mixed>
             */
            public function toArray(Request $request): array
            {
                return [
                    'id' => $this->id,
                    'name' => $this->name,
                    'email' => $this->email,
                    'registered_at' => $this->created_at->format('Y-m-d H:i:s'),
                    // يمكنك إضافة المزيد من الحقول هنا، لكن تجنب كشف معلومات حساسة مثل كلمة المرور
                    // 'role' => $this->role, // إذا كان لديك حقل دور للمستخدم
                ];
            }
        }
        ```
    *   **`ProductResource`**: لتحويل بيانات المنتج.
        ```bash
        php artisan make:resource ProductResource
        ```
        *مثال على المحتوى:*
        ```php
        <?php

        namespace App\Http\Resources;

        use Illuminate\Http\Request;
        use Illuminate\Http\Resources\Json\JsonResource;

        class ProductResource extends JsonResource
        {
            public function toArray(Request $request): array
            {
                return [
                    'id' => $this->id,
                    'product_name' => $this->product_name,
                    'price' => (float) $this->price,
                    'type' => new ProductTypeResource($this->whenLoaded('productType')), // Assuming relationship 'productType'
                    'album_photos' => json_decode($this->album_photos), // Assuming it's stored as JSON string
                    'shape' => $this->shape,
                    'owner' => new UserResource($this->whenLoaded('owner')), // Assuming relationship 'owner' to User
                    'status' => $this->status,
                    'rating' => (float) $this->rating,
                    'weight' => (float) $this->weight,
                    'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
                ];
            }
        }
        ```
    *   **`ProductTypeResource`**: لتحويل بيانات نوع المنتج.
        ```bash
        php artisan make:resource ProductTypeResource
        ```
        *مثال على المحتوى:*
        ```php
        <?php

        namespace App\Http\Resources;

        use Illuminate\Http\Request;
        use Illuminate\Http\Resources\Json\JsonResource;

        class ProductTypeResource extends JsonResource
        {
            public function toArray(Request $request): array
            {
                return [
                    'id' => $this->id,
                    'type_name' => $this->type_name,
                    'description' => $this->description,
                    'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                ];
            }
        }
        ```

2.  **Resources الخاصة بسلة التسوق والطلبات والتقييمات:**
    *   **`CartResource`**: لتحويل بيانات عناصر السلة.
        ```bash
        php artisan make:resource CartResource
        ```
        *مثال على المحتوى:*
        ```php
        <?php

        namespace App\Http\Resources;

        use Illuminate\Http\Request;
        use Illuminate\Http\Resources\Json\JsonResource;

        class CartResource extends JsonResource
        {
            public function toArray(Request $request): array
            {
                return [
                    'id' => $this->id,
                    'user_id' => $this->user_id,
                    'product' => new ProductResource($this->whenLoaded('product')), // Assuming relationship 'product'
                    'quantity' => $this->quantity,
                    'total_price' => (float) $this->total_price,
                    'added_time' => $this->added_time->format('Y-m-d H:i:s'),
                ];
            }
        }
        ```
    *   **`OrderResource`**: لتحويل بيانات الطلب.
        ```bash
        php artisan make:resource OrderResource
        ```
        *مثال على المحتوى:*
        ```php
        <?php

        namespace App\Http\Resources;

        use Illuminate\Http\Request;
        use Illuminate\Http\Resources\Json\JsonResource;

        class OrderResource extends JsonResource
        {
            public function toArray(Request $request): array
            {
                return [
                    'id' => $this->id,
                    'user' => new UserResource($this->whenLoaded('user')), // Assuming relationship 'user'
                    'order_date' => $this->order_date->format('Y-m-d H:i:s'),
                    'total_price' => (float) $this->total_price,
                    'status' => $this->status,
                    'items' => OrderItemResource::collection($this->whenLoaded('items')), // Assuming relationship 'items'
                ];
            }
        }
        ```
    *   **`OrderItemResource`**: لتحويل بيانات عناصر الطلب.
        ```bash
        php artisan make:resource OrderItemResource
        ```
        *مثال على المحتوى:*
        ```php
        <?php

        namespace App\Http\Resources;

        use Illuminate\Http\Request;
        use Illuminate\Http\Resources\Json\JsonResource;

        class OrderItemResource extends JsonResource
        {
            public function toArray(Request $request): array
            {
                return [
                    'order_item_id' => $this->order_item_id,
                    'order_id' => $this->order_id,
                    'product' => new ProductResource($this->whenLoaded('product')), // Assuming relationship 'product'
                    'quantity' => $this->quantity,
                    'total_price' => (float) $this->total_price,
                    'added_time' => $this->added_time->format('Y-m-d H:i:s'),
                ];
            }
        }
        ```
    *   **`RatingResource`**: لتحويل بيانات التقييم.
        ```bash
        php artisan make:resource RatingResource
        ```
        *مثال على المحتوى:*
        ```php
        <?php

        namespace App\Http\Resources;

        use Illuminate\Http\Request;
        use Illuminate\Http\Resources\Json\JsonResource;

        class RatingResource extends JsonResource
        {
            public function toArray(Request $request): array
            {
                return [
                    'id' => $this->id,
                    'user' => new UserResource($this->whenLoaded('user')),
                    'product' => new ProductResource($this->whenLoaded('product')),
                    'rating_value' => (float) $this->rating_value,
                    'comment' => $this->comment,
                    'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                ];
            }
        }
        ```

**ملخص الأوامر لإنشاء Resources:**

```bash
php artisan make:resource UserResource
php artisan make:resource ProductResource
php artisan make:resource ProductTypeResource
php artisan make:resource CartResource
php artisan make:resource OrderResource
php artisan make:resource OrderItemResource
php artisan make:resource RatingResource
```

---

**ملاحظات أخيرة قبل أن ترسل لي `web.php`:**

*   **العلاقات في Models:** تأكد من تعريف العلاقات (Relationships) في ملفات Models الخاصة بك (مثل `User.php`, `Product.php`, `Cart.php` إلخ) لتتمكن من استخدام `->whenLoaded()` في الـ Resources لجلب البيانات المرتبطة بكفاءة.
*   **المجلدات (`Admin`):** لاحظ أنني استخدمت `Admin\\ProductController` و `Admin\\UpdateProductStatusRequest`، هذا يعني أنك ستحتاج إلى إنشاء مجلد `Admin` داخل `app/Http/Controllers` و `app/Http/Requests` لتنظيم المتحكمات والـ Requests الخاصة بالإدارة.
*   **Authentication & Authorization:** تذكر أن تفعيل أدوار المستخدمين (بائع/مشتري/مشرف) يتطلب إضافة حقل `role` في جدول `users` واستخدام Middleware أو Gates/Policies للتحكم في الوصول إلى المتحكمات والطرق.
*   **ملفات View:** ستحتاج أيضاً لإنشاء ملفات View (`.blade.php`) لكل صفحة رئيسية (مثل صفحة عرض المنتجات، سلة التسوق، صفحة البائع لمنتجاته، لوحة تحكم المشرف).


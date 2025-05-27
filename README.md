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




---

أهلاً بك! هذا تحدٍ رائع ومفصل، وسأقدم لك المحتوى الكامل والنهائي لجميع المتحكمات والـ Requests والـ Resources، مع الأخذ في الاعتبار قاعدة البيانات النهائية والنماذج (Models) التي أرفقتها.

**ملاحظات هامة قبل البدء:**

1.  **دور المستخدم (Role):** لقد قمت بتحديث حقل `role` في جدول `users` إلى `['مدير', 'مستخدم عادي', 'بائع']`. سأفترض أن:
    *   **المشتري** هو `مستخدم عادي`.
    *   **البائع** هو `بائع`.
    *   **المشرف** هو `مدير`.
    *   سأضيف دوال مساعدة بسيطة في نموذج `User` للتحقق من الدور.
2.  **Authentication & Authorization:** سأقوم بتضمين بعض الشيكات الأساسية للـ authorization (مثل `Auth::check()` و `Auth::user()->isSeller()`) داخل المتحكمات والـ Requests. في مشروع حقيقي، يُفضل استخدام Laravel Policies للحصول على نظام صلاحيات أكثر قوة ومرونة.
3.  **العلاقات في Models:** تأكد أنك قمت بتحديد جميع العلاقات (`hasMany`, `belongsTo`) في ملفات Models الخاصة بك كما أشرت في ردك (أرفقتها بالفعل وهي صحيحة).
4.  **المسارات (Routes):** تذكر أن كل متحكم يحتاج إلى مسار واحد على الأقل في ملف `web.php` أو `api.php` لكي يعمل. (سأنتظر ملفك `web.php` لتكملة هذا الجزء).
5.  **واجهات المستخدم (Views):** هذه الأكواد هي لجزء الـ Backend. ستحتاج إلى بناء الواجهات الأمامية (`.blade.php` files) التي تتفاعل مع هذه المتحكمات (مثل صفحات عرض المنتجات، سلة التسوق، صفحة إضافة منتج جديد، إلخ).
6.  **رفع الصور:** سأفترض أن الصور تُرفع إلى `storage/app/public` وأنك قمت بربط مجلد `public/storage` بهذا المسار (`php artisan storage:link`).
7.  **التعليقات:** سأكتب التعليقات باللغة العربية داخل الأكواد لتوضيح الغرض من كل جزء.

لنبدأ!

---

### أولاً: تعديلات على Models (مهمة لسهولة الاستخدام)

بما أنك أضفت حقل `role` إلى جدول `users`، يمكننا إضافة دوال مساعدة لنموذج `User` لتسهيل التحقق من دور المستخدم:

**`app/Models/User.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany; // إضافة لاستخدام HasMany

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'gender',
        'birth_date',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birth_date' => 'date', // تحويل تاريخ الميلاد إلى كائن تاريخ
        ];
    }

    /**
     * الدالة المساعدة للتحقق إذا كان المستخدم مشرفًا.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'مدير';
    }

    /**
     * الدالة المساعدة للتحقق إذا كان المستخدم بائعًا.
     */
    public function isSeller(): bool
    {
        return $this->role === 'بائع';
    }

    /**
     * الدالة المساعدة للتحقق إذا كان المستخدم مشتريًا (مستخدم عادي).
     */
    public function isBuyer(): bool
    {
        return $this->role === 'مستخدم عادي';
    }

    // العلاقات التي يجب أن تضاف لنموذج User
    // المنتجات التي يملكها هذا المستخدم (إذا كان بائعاً)
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'owner_user_id');
    }

    // سلة التسوق الخاصة بهذا المستخدم (إذا كان مشترياً)
    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class, 'user_id');
    }

    // الطلبات التي قام بها هذا المستخدم (إذا كان مشترياً)
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    // التقييمات التي قام بها هذا المستخدم
    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class, 'user_id');
    }
}
```

---

### ثانياً: المحتوى الكامل والنهائي لملفات Requests

سنقوم بإنشاء أو تعديل ملفات Requests للتحقق من صحة البيانات.

**1. `app/Http/Requests/Auth/RegisterRequest.php`** (يجب إنشاؤه، واستخدامه في RegisterController)
هذا هو بديل للطريقة `validator` في RegisterController الافتراضي، وهو أفضل ممارسة.

```php
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
```

**2. `app/Http/Requests/StoreProductRequest.php`**

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProductRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مخولاً لتقديم هذا الطلب.
     */
    public function authorize(): bool
    {
        // فقط البائعون المصرح لهم يمكنهم إضافة منتجات
        return Auth::check() && Auth::user()->isSeller();
    }

    /**
     * الحصول على قواعد التحقق التي تنطبق على الطلب.
     */
    public function rules(): array
    {
        return [
            'product_name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0.01'],
            'type_id' => ['required', 'exists:product_types,id'],
            'album_photos' => ['array'], // لتلقي مصفوفة من الصور
            'album_photos.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5000'], // لكل صورة فردية (5 ميجابايت)
            'shape' => ['nullable', 'string', 'max:255'],
            'weight' => ['nullable', 'numeric', 'min:0'],
        ];
    }

    /**
     * الحصول على رسائل الخطأ المخصصة لقواعد التحقق.
     */
    public function messages(): array
    {
        return [
            'product_name.required' => 'اسم المنتج مطلوب.',
            'price.required' => 'سعر المنتج مطلوب.',
            'price.numeric' => 'السعر يجب أن يكون رقماً.',
            'price.min' => 'السعر يجب أن يكون أكبر من صفر.',
            'type_id.required' => 'نوع المنتج مطلوب.',
            'type_id.exists' => 'نوع المنتج المحدد غير صالح.',
            'album_photos.array' => 'يجب أن تكون الصور مصفوفة.',
            'album_photos.*.image' => 'يجب أن تكون الصور من نوع صورة.',
            'album_photos.*.mimes' => 'صيغ الصور المدعومة هي: jpeg, png, jpg, gif, webp.',
            'album_photos.*.max' => 'حجم الصورة لا يجب أن يتجاوز 5 ميجابايت.',
            'weight.numeric' => 'الوزن يجب أن يكون رقماً.',
            'weight.min' => 'الوزن يجب أن يكون موجباً.',
        ];
    }
}
```

**3. `app/Http/Requests/UpdateProductRequest.php`**

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Product; // استيراد نموذج المنتج

class UpdateProductRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مخولاً لتقديم هذا الطلب.
     */
    public function authorize(): bool
    {
        // يجب أن يكون المستخدم بائعاً وأن يكون مالك المنتج
        $product = Product::findOrFail($this->route('product')); // افتراض أن الـ route parameter هو 'product'
        return Auth::check() && Auth::user()->isSeller() && Auth::id() === $product->owner_user_id;
    }

    /**
     * الحصول على قواعد التحقق التي تنطبق على الطلب.
     */
    public function rules(): array
    {
        return [
            'product_name' => ['sometimes', 'required', 'string', 'max:255'],
            'price' => ['sometimes', 'required', 'numeric', 'min:0.01'],
            'type_id' => ['sometimes', 'required', 'exists:product_types,id'],
            'album_photos' => ['array'], // لتلقي مصفوفة من الصور
            'album_photos.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5000'], // لكل صورة فردية
            'shape' => ['nullable', 'string', 'max:255'],
            'weight' => ['nullable', 'numeric', 'min:0'],
            // لا يمكن للبائع تغيير الحالة مباشرة، فقط المشرف
        ];
    }

    /**
     * الحصول على رسائل الخطأ المخصصة لقواعد التحقق.
     */
    public function messages(): array
    {
        return [
            'product_name.required' => 'اسم المنتج مطلوب.',
            'price.required' => 'سعر المنتج مطلوب.',
            'price.numeric' => 'السعر يجب أن يكون رقماً.',
            'price.min' => 'السعر يجب أن يكون أكبر من صفر.',
            'type_id.required' => 'نوع المنتج مطلوب.',
            'type_id.exists' => 'نوع المنتج المحدد غير صالح.',
            'album_photos.array' => 'يجب أن تكون الصور مصفوفة.',
            'album_photos.*.image' => 'يجب أن تكون الصور من نوع صورة.',
            'album_photos.*.mimes' => 'صيغ الصور المدعومة هي: jpeg, png, jpg, gif, webp.',
            'album_photos.*.max' => 'حجم الصورة لا يجب أن يتجاوز 5 ميجابايت.',
            'weight.numeric' => 'الوزن يجب أن يكون رقماً.',
            'weight.min' => 'الوزن يجب أن يكون موجباً.',
        ];
    }
}
```

**4. `app/Http/Requests/AddToCartRequest.php`**

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddToCartRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مخولاً لتقديم هذا الطلب.
     */
    public function authorize(): bool
    {
        // فقط المستخدمون المسجلون (المشترون) يمكنهم إضافة إلى السلة
        return Auth::check() && Auth::user()->isBuyer();
    }

    /**
     * الحصول على قواعد التحقق التي تنطبق على الطلب.
     */
    public function rules(): array
    {
        return [
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['required', 'integer', 'min:1'],
        ];
    }

    /**
     * الحصول على رسائل الخطأ المخصصة لقواعد التحقق.
     */
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

**5. `app/Http/Requests/StoreOrderRequest.php`**

```php
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
```

**6. `app/Http/Requests/StoreRatingRequest.php`**

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRatingRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مخولاً لتقديم هذا الطلب.
     */
    public function authorize(): bool
    {
        // فقط المستخدمون المسجلون (المشترون) يمكنهم التقييم
        return Auth::check() && Auth::user()->isBuyer();
    }

    /**
     * الحصول على قواعد التحقق التي تنطبق على الطلب.
     */
    public function rules(): array
    {
        return [
            'product_id' => ['required', 'exists:products,id'],
            'rating_value' => ['required', 'numeric', 'between:0.5,5.0'], // تقييم من 0.5 إلى 5
            'comment' => ['nullable', 'string', 'max:1000'],
        ];
    }

    /**
     * الحصول على رسائل الخطأ المخصصة لقواعد التحقق.
     */
    public function messages(): array
    {
        return [
            'product_id.required' => 'معرف المنتج مطلوب للتقييم.',
            'product_id.exists' => 'المنتج الذي تحاول تقييمه غير موجود.',
            'rating_value.required' => 'قيمة التقييم مطلوبة.',
            'rating_value.numeric' => 'قيمة التقييم يجب أن تكون رقماً.',
            'rating_value.between' => 'قيمة التقييم يجب أن تكون بين 0.5 و 5.0.',
            'comment.max' => 'يجب ألا يتجاوز التعليق 1000 حرف.',
        ];
    }
}
```

**7. `app/Http/Requests/Admin/UpdateProductStatusRequest.php`** (انشئ مجلد `Admin` داخل `app/Http/Requests`)

```php
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
```

**8. `app/Http/Requests/Admin/StoreProductTypeRequest.php`**

```php
<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProductTypeRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مخولاً لتقديم هذا الطلب.
     */
    public function authorize(): bool
    {
        // فقط المشرفون يمكنهم إضافة أنواع منتجات
        return Auth::check() && Auth::user()->isAdmin();
    }

    /**
     * الحصول على قواعد التحقق التي تنطبق على الطلب.
     */
    public function rules(): array
    {
        return [
            'type_name' => ['required', 'string', 'max:255', 'unique:product_types,type_name'],
            'description' => ['nullable', 'string'],
        ];
    }

    /**
     * الحصول على رسائل الخطأ المخصصة لقواعد التحقق.
     */
    public function messages(): array
    {
        return [
            'type_name.required' => 'اسم نوع المنتج مطلوب.',
            'type_name.unique' => 'اسم نوع المنتج هذا موجود بالفعل.',
        ];
    }
}
```

**9. `app/Http/Requests/Admin/UpdateProductTypeRequest.php`**

```php
<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProductTypeRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مخولاً لتقديم هذا الطلب.
     */
    public function authorize(): bool
    {
        // فقط المشرفون يمكنهم تحديث أنواع منتجات
        return Auth::check() && Auth::user()->isAdmin();
    }

    /**
     * الحصول على قواعد التحقق التي تنطبق على الطلب.
     */
    public function rules(): array
    {
        return [
            'type_name' => ['sometimes', 'required', 'string', 'max:255', Rule::unique('product_types', 'type_name')->ignore($this->route('product_type'))],
            'description' => ['nullable', 'string'],
        ];
    }

    /**
     * الحصول على رسائل الخطأ المخصصة لقواعد التحقق.
     */
    public function messages(): array
    {
        return [
            'type_name.required' => 'اسم نوع المنتج مطلوب.',
            'type_name.unique' => 'اسم نوع المنتج هذا موجود بالفعل.',
        ];
    }
}
```

**10. `app/Http/Requests/Admin/UpdateUserRequest.php`**

```php
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
```
---

### ثالثاً: المحتوى الكامل والنهائي لملفات Resources

**1. `app/Http/Resources/UserResource.php`**

```php
<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * تحويل المورد إلى مصفوفة.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'full_name' => $this->first_name . ' ' . $this->last_name, // إضافة اسم كامل
            'username' => $this->username,
            'email' => $this->email,
            'gender' => $this->gender,
            'birth_date' => $this->birth_date ? $this->birth_date->format('Y-m-d') : null,
            'role' => $this->role,
            'email_verified_at' => $this->email_verified_at ? $this->email_verified_at->format('Y-m-d H:i:s') : null,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            // لا تقم بإرجاع كلمة المرور أو رمز التذكر لأسباب أمنية
        ];
    }
}
```

**2. `app/Http/Resources/ProductResource.php`**

```php
<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage; // لاستخدام تخزين الصور

class ProductResource extends JsonResource
{
    /**
     * تحويل المورد إلى مصفوفة.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $photos = [];
        if (is_array($this->album_photos)) {
            foreach ($this->album_photos as $photoPath) {
                // التأكد من أن المسار يبدأ بـ 'public/' أو ما يناسب إعداداتك
                // وإرجاع الـ URL العام للصورة
                $photos[] = Storage::url($photoPath);
            }
        }
        // أو إذا كنت تخزن المسارات الكاملة مباشرة في قاعدة البيانات
        // $photos = is_array($this->album_photos) ? $this->album_photos : [];


        return [
            'id' => $this->id,
            'product_name' => $this->product_name,
            'price' => (float) $this->price,
            // استخدام ProductTypeResource لتحويل بيانات النوع
            'type' => new ProductTypeResource($this->whenLoaded('type')), // العلاقة هي 'type' وليس 'productType'
            'album_photos' => $photos, // الآن سيحتوي على URLs قابلة للوصول
            'shape' => $this->shape,
            // استخدام UserResource لتحويل بيانات المالك
            'owner' => new UserResource($this->whenLoaded('owner')),
            'status' => $this->status,
            'rating' => (float) $this->rating,
            'weight' => (float) $this->weight,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
```

**3. `app/Http/Resources/ProductTypeResource.php`**

```php
<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductTypeResource extends JsonResource
{
    /**
     * تحويل المورد إلى مصفوفة.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type_name' => $this->type_name,
            'description' => $this->description,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
```

**4. `app/Http/Resources/CartResource.php`**

```php
<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * تحويل المورد إلى مصفوفة.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            // تحميل بيانات المنتج المرتبط
            'product' => new ProductResource($this->whenLoaded('product')),
            'quantity' => $this->quantity,
            'total_price' => (float) $this->total_price,
            'added_time' => $this->added_time->format('Y-m-d H:i:s'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
```

**5. `app/Http/Resources/OrderResource.php`**

```php
<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * تحويل المورد إلى مصفوفة.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            // تحميل بيانات المستخدم المرتبط
            'user' => new UserResource($this->whenLoaded('user')),
            'order_date' => $this->order_date->format('Y-m-d H:i:s'),
            'total_price' => (float) $this->total_price,
            'status' => $this->status,
            // تحميل عناصر الطلب (مجموعة من OrderItemResource)
            'items' => OrderItemResource::collection($this->whenLoaded('items')), // العلاقة هي 'items'
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
```

**6. `app/Http/Resources/OrderItemResource.php`**

```php
<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    /**
     * تحويل المورد إلى مصفوفة.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'order_item_id' => $this->order_item_id, // استخدام primaryKey المخصص
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            // تحميل بيانات المنتج المرتبط
            'product' => new ProductResource($this->whenLoaded('product')),
            'quantity' => $this->quantity,
            'total_price' => (float) $this->total_price,
            'added_time' => $this->added_time->format('Y-m-d H:i:s'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
```

**7. `app/Http/Resources/RatingResource.php`**

```php
<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
{
    /**
     * تحويل المورد إلى مصفوفة.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            // تحميل بيانات المستخدم المرتبط
            'user' => new UserResource($this->whenLoaded('user')),
            'product_id' => $this->product_id,
            // تحميل بيانات المنتج المرتبط
            'product' => new ProductResource($this->whenLoaded('product')),
            'rating_value' => (float) $this->rating_value,
            'comment' => $this->comment,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
```

---

### رابعاً: المحتوى الكامل والنهائي لملفات Controllers

**1. `app/Http/Controllers/HomeController.php`** (كما أرسلته، لا يحتاج لتعديل كبير هنا إلا إذا أردت تخصيص الصفحة الرئيسية لكل دور)

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // استخدام Auth

class HomeController extends Controller
{
    /**
     * إنشاء مثيل متحكم جديد.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * عرض لوحة تحكم التطبيق.
     * يمكن تخصيصها لتوجيه كل دور إلى لوحة التحكم الخاصة به.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard'); // أو view('admin.home')
        } elseif (Auth::user()->isSeller()) {
            return redirect()->route('seller.dashboard'); // أو view('seller.home')
        } else { // المستخدم العادي (المشتري)
            return view('home'); // الصفحة الرئيسية الافتراضية للمستخدمين العاديين
        }
    }
}
```

**2. `app/Http/Controllers/Auth/RegisterController.php`** (تعديل لاستخدام RegisterRequest وقيم المستخدم الجديدة)

```php
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
```

**3. `app/Http/Controllers/ProductController.php`** (للزوار والمشترين لعرض المنتجات)

```php
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType; // لفلترة الأنواع
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * عرض قائمة بجميع المنتجات (يمكن للزوار والمستخدمين رؤيتها).
     */
    public function index(Request $request)
    {
        $query = Product::with('type', 'owner'); // تحميل العلاقات

        // البحث حسب الصنف
        if ($request->has('type_id')) {
            $query->where('type_id', $request->type_id);
        }

        // البحث حسب السعر
        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // البحث حسب اسم المنتج
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('product_name', 'like', "%{$search}%")
                  ->orWhereHas('type', function ($q) use ($search) {
                      $q->where('type_name', 'like', "%{$search}%");
                  });
        }

        // عرض فقط المنتجات التي "تم الإضافة" أو "تم البيع" (وليس "قيد التحقق" أو "تم الرفض")
        $query->whereIn('status', ['تم الإضافة', 'تم البيع']);

        $products = $query->paginate(10); // تحديد عدد المنتجات في كل صفحة

        // للـ API يمكنك إرجاع Resource Collection:
        // return ProductResource::collection($products);

        // للـ Web، تمرير البيانات إلى الواجهة الأمامية
        $productTypes = ProductType::all(); // لجلب أنواع المنتجات لخيارات الفلترة
        return view('products.index', compact('products', 'productTypes'));
    }

    /**
     * عرض تفاصيل منتج معين.
     */
    public function show(Product $product)
    {
        // تأكد أن المنتج متاح للعرض (ليس قيد التحقق أو مرفوض)
        if (!in_array($product->status, ['تم الإضافة', 'تم البيع'])) {
            abort(404, 'المنتج غير متوفر للعرض.');
        }

        $product->load('type', 'owner', 'ratings.user'); // تحميل العلاقات الضرورية
        // للـ API يمكنك إرجاع ProductResource:
        // return new ProductResource($product);

        // للـ Web، تمرير البيانات إلى الواجهة الأمامية
        return view('products.show', compact('product'));
    }

    // بما أن هذا المتحكم هو للمشترين والزوار، فلا داعي لـ create, store, edit, update, destroy هنا.
    // هذه العمليات ستتم في SellerProductController و Admin\ProductController.
}
```

**4. `app/Http/Controllers/CartController.php`** (للمشترين)

```php
<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Http\Requests\AddToCartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CartResource;

class CartController extends Controller
{
    /**
     * يجب أن يكون المستخدم مسجلاً للدخول لإدارة السلة.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole:مستخدم عادي')->only(['index', 'store', 'update', 'destroy']);
    }

    /**
     * عرض محتويات سلة التسوق للمستخدم الحالي.
     */
    public function index()
    {
        $cartItems = Auth::user()->carts()->with('product.type')->get();

        // للـ API:
        // return CartResource::collection($cartItems);

        // للـ Web:
        return view('cart.index', compact('cartItems'));
    }

    /**
     * إضافة منتج إلى سلة التسوق أو تحديث كميته.
     */
    public function store(AddToCartRequest $request)
    {
        $product = Product::findOrFail($request->product_id);
        $user = Auth::user();

        // حساب السعر الإجمالي للعنصر الواحد
        $itemTotalPrice = $product->price * $request->quantity;

        $cartItem = $user->carts()->where('product_id', $product->id)->first();

        if ($cartItem) {
            // تحديث الكمية والسعر الإجمالي إذا كان المنتج موجوداً بالفعل في السلة
            $cartItem->quantity += $request->quantity;
            $cartItem->total_price = $cartItem->quantity * $product->price;
            $cartItem->save();
            $message = 'تم تحديث كمية المنتج في سلة التسوق.';
        } else {
            // إضافة منتج جديد إلى السلة
            $cartItem = Cart::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'total_price' => $itemTotalPrice,
            ]);
            $message = 'تمت إضافة المنتج إلى سلة التسوق.';
        }

        // للـ API:
        // return response()->json(['message' => $message, 'cart_item' => new CartResource($cartItem)]);

        // للـ Web:
        return redirect()->back()->with('success', $message);
    }

    /**
     * تحديث كمية منتج معين في السلة.
     * (يمكن استخدام نفس طريقة Store إذا تم إرسال الكمية الجديدة بالكامل)
     */
    public function update(Request $request, Cart $cart)
    {
        // تحقق من أن السلة ملك للمستخدم الحالي
        if ($cart->user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بتعديل عنصر السلة هذا.');
        }

        $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $product = $cart->product; // جلب المنتج المرتبط
        if (!$product) {
            return redirect()->back()->with('error', 'المنتج غير موجود.');
        }

        $cart->quantity = $request->quantity;
        $cart->total_price = $request->quantity * $product->price;
        $cart->save();

        // للـ API:
        // return response()->json(['message' => 'تم تحديث كمية المنتج.', 'cart_item' => new CartResource($cart)]);

        // للـ Web:
        return redirect()->back()->with('success', 'تم تحديث كمية المنتج في السلة.');
    }

    /**
     * إزالة منتج من سلة التسوق.
     */
    public function destroy(Cart $cart)
    {
        // تحقق من أن السلة ملك للمستخدم الحالي
        if ($cart->user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بحذف عنصر السلة هذا.');
        }

        $cart->delete();

        // للـ API:
        // return response()->json(['message' => 'تمت إزالة المنتج من السلة.']);

        // للـ Web:
        return redirect()->back()->with('success', 'تمت إزالة المنتج من السلة بنجاح.');
    }
}
```

**5. `app/Http/Controllers/OrderController.php`** (للمشترين)

```php
<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderItem;
use App\Http\Requests\StoreOrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    /**
     * يجب أن يكون المستخدم مسجلاً للدخول.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole:مستخدم عادي')->only(['index', 'store', 'show']);
    }

    /**
     * عرض جميع الطلبات الخاصة بالمستخدم الحالي.
     */
    public function index()
    {
        $orders = Auth::user()->orders()->with('items.product.type')->get();

        // للـ API:
        // return OrderResource::collection($orders);

        // للـ Web:
        return view('orders.index', compact('orders'));
    }

    /**
     * عرض تفاصيل طلب معين للمستخدم الحالي.
     */
    public function show(Order $order)
    {
        // تحقق من أن الطلب ملك للمستخدم الحالي
        if ($order->user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بعرض هذا الطلب.');
        }

        $order->load('items.product.type', 'user');

        // للـ API:
        // return new OrderResource($order);

        // للـ Web:
        return view('orders.show', compact('order'));
    }

    /**
     * إنشاء طلب جديد من محتويات سلة التسوق.
     * (يمثل عملية الشراء والدفع الإلكتروني)
     */
    public function store(StoreOrderRequest $request)
    {
        $user = Auth::user();
        $cartItems = $user->carts()->with('product')->get();

        if ($cartItems->isEmpty()) {
            // للـ API:
            // return response()->json(['message' => 'سلة التسوق فارغة.'], 400);
            // للـ Web:
            return redirect()->back()->with('error', 'لا يمكن إنشاء طلب، سلة التسوق فارغة.');
        }

        $totalPrice = $cartItems->sum('total_price');

        DB::beginTransaction();
        try {
            // إنشاء الطلب
            $order = Order::create([
                'user_id' => $user->id,
                'order_date' => now(),
                'total_price' => $totalPrice,
                'status' => 'جديد', // يمكن تغييرها إلى 'تم الدفع' بعد إتمام عملية الدفع الفعلية
            ]);

            // نقل عناصر السلة إلى عناصر الطلب
            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'total_price' => $cartItem->total_price,
                    'added_time' => $cartItem->added_time,
                ]);
            }

            // إفراغ سلة التسوق بعد إنشاء الطلب بنجاح
            $user->carts()->delete();

            DB::commit();

            // للـ API:
            // return response()->json(['message' => 'تم إنشاء الطلب بنجاح. سيتم توجيهك لصفحة الدفع.', 'order' => new OrderResource($order)], 201);
            // للـ Web:
            return redirect()->route('orders.show', $order->id)->with('success', 'تم إنشاء الطلب بنجاح. يرجى إتمام عملية الدفع.');

        } catch (\Exception $e) {
            DB::rollBack();
            // للـ API:
            // return response()->json(['message' => 'حدث خطأ أثناء إنشاء الطلب: ' . $e->getMessage()], 500);
            // للـ Web:
            return redirect()->back()->with('error', 'حدث خطأ أثناء إنشاء الطلب. يرجى المحاولة مرة أخرى.');
        }
    }

    /**
     * محاكاة عملية الدفع الإلكتروني.
     * (هذه مجرد دالة Dummy، في الواقع ستتفاعل مع بوابة دفع خارجية)
     */
    public function processPayment(Request $request, Order $order)
    {
        // تحقق من أن الطلب ملك للمستخدم الحالي وحالته 'جديد'
        if ($order->user_id !== Auth::id() || $order->status !== 'جديد') {
            abort(403, 'غير مصرح لك بمعالجة دفع هذا الطلب أو أن حالته لا تسمح بالدفع.');
        }

        // هنا يمكنك إضافة منطق الدفع الفعلي مع بوابة دفع (مثل Stripe, PayPal, إلخ)
        // بعد نجاح الدفع:
        $order->status = 'تم الدفع';
        $order->save();

        // للـ API:
        // return response()->json(['message' => 'تم الدفع بنجاح.', 'order' => new OrderResource($order)]);
        // للـ Web:
        return redirect()->route('orders.show', $order->id)->with('success', 'تم الدفع بنجاح. طلبك قيد المعالجة.');
    }
}
```

**6. `app/Http/Controllers/RatingController.php`** (للمشترين)

```php
<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Product;
use App\Http\Requests\StoreRatingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\RatingResource;

class RatingController extends Controller
{
    /**
     * يجب أن يكون المستخدم مسجلاً للدخول.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole:مستخدم عادي')->only(['store', 'update', 'destroy']);
    }

    /**
     * إضافة تقييم جديد لمنتج.
     * أو تحديث تقييم موجود.
     */
    public function store(StoreRatingRequest $request)
    {
        $user = Auth::user();
        $product = Product::findOrFail($request->product_id);

        // التحقق إذا كان المستخدم قد اشترى هذا المنتج بالفعل
        // هذه خطوة مهمة لضمان أن التقييمات تأتي من مشترين حقيقيين
        $hasPurchased = $user->orders()->whereHas('items', function ($query) use ($product) {
            $query->where('product_id', $product->id);
        })->exists();

        if (!$hasPurchased) {
            // للـ API:
            // return response()->json(['message' => 'لا يمكنك تقييم منتج لم تقم بشرائه.'], 403);
            // للـ Web:
            return redirect()->back()->with('error', 'لا يمكنك تقييم منتج لم تقم بشرائه.');
        }

        // البحث عن تقييم موجود لهذا المستخدم وللمنتج
        $rating = Rating::where('user_id', $user->id)
                        ->where('product_id', $product->id)
                        ->first();

        if ($rating) {
            // تحديث التقييم الموجود
            $rating->rating_value = $request->rating_value;
            $rating->comment = $request->comment;
            $rating->save();
            $message = 'تم تحديث تقييمك بنجاح.';
        } else {
            // إنشاء تقييم جديد
            $rating = Rating::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'rating_value' => $request->rating_value,
                'comment' => $request->comment,
            ]);
            $message = 'تم إضافة تقييمك بنجاح.';
        }

        // تحديث متوسط التقييم للمنتج
        $this->updateProductAverageRating($product);

        // للـ API:
        // return response()->json(['message' => $message, 'rating' => new RatingResource($rating)], $rating->wasRecentlyCreated ? 201 : 200);
        // للـ Web:
        return redirect()->back()->with('success', $message);
    }

    /**
     * تحديث متوسط التقييم لمنتج معين.
     * (دالة مساعدة)
     */
    protected function updateProductAverageRating(Product $product)
    {
        $averageRating = $product->ratings()->avg('rating_value');
        $product->rating = round($averageRating, 1); // تقريب لأقرب رقم عشري
        $product->save();
    }

    /**
     * يمكن للمستخدم حذف تقييمه الخاص.
     */
    public function destroy(Rating $rating)
    {
        if ($rating->user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بحذف هذا التقييم.');
        }

        $product = $rating->product; // حفظ المنتج قبل حذف التقييم

        $rating->delete();
        $this->updateProductAverageRating($product); // إعادة حساب متوسط التقييم

        // للـ API:
        // return response()->json(['message' => 'تم حذف التقييم بنجاح.']);
        // للـ Web:
        return redirect()->back()->with('success', 'تم حذف التقييم بنجاح.');
    }
}
```

**7. `app/Http/Controllers/WishlistController.php`** (كمثال. لاحظ أن جدول `wishlists` غير موجود في قاعدة البيانات التي قدمتها، لذا ستحتاج لإنشائه.)

```php
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist; // افترض أنك أنشأت هذا النموذج والجدول

class WishlistController extends Controller
{
    /**
     * يجب أن يكون المستخدم مسجلاً للدخول.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole:مستخدم عادي')->only(['index', 'store', 'destroy']);
    }

    /**
     * عرض قائمة المفضلة للمستخدم الحالي.
     */
    public function index()
    {
        // افترض أنك أضفت علاقة 'wishlists' إلى نموذج User
        $wishlistItems = Auth::user()->wishlists()->with('product.type')->get();

        // للـ API:
        // return WishlistResource::collection($wishlistItems); // ستحتاج لإنشاء WishlistResource

        // للـ Web:
        return view('wishlist.index', compact('wishlistItems'));
    }

    /**
     * إضافة منتج إلى قائمة المفضلة.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
        ]);

        $user = Auth::user();
        $product = Product::findOrFail($request->product_id);

        // التحقق مما إذا كان المنتج موجوداً بالفعل في المفضلة
        $existing = Wishlist::where('user_id', $user->id)
                            ->where('product_id', $product->id)
                            ->first();

        if ($existing) {
            // للـ API:
            // return response()->json(['message' => 'المنتج موجود بالفعل في قائمة المفضلة.'], 409);
            // للـ Web:
            return redirect()->back()->with('info', 'المنتج موجود بالفعل في قائمة المفضلة.');
        }

        Wishlist::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);

        // للـ API:
        // return response()->json(['message' => 'تمت إضافة المنتج إلى قائمة المفضلة بنجاح.'], 201);
        // للـ Web:
        return redirect()->back()->with('success', 'تمت إضافة المنتج إلى قائمة المفضلة بنجاح.');
    }

    /**
     * إزالة منتج من قائمة المفضلة.
     */
    public function destroy(Wishlist $wishlist)
    {
        // تحقق من أن عنصر المفضلة ملك للمستخدم الحالي
        if ($wishlist->user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بحذف عنصر المفضلة هذا.');
        }

        $wishlist->delete();

        // للـ API:
        // return response()->json(['message' => 'تمت إزالة المنتج من قائمة المفضلة.']);
        // للـ Web:
        return redirect()->back()->with('success', 'تمت إزالة المنتج من قائمة المفضلة بنجاح.');
    }
}
```

**8. `app/Http/Controllers/ProfileController.php`** (لجميع المستخدمين لتحديث بياناتهم)

```php
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
```

**9. `app/Http/Controllers/SellerProductController.php`** (للبائعين لإدارة منتجاتهم)

```php
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ProductResource;

class SellerProductController extends Controller
{
    /**
     * يجب أن يكون المستخدم بائعاً.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole:بائع'); // Middleware للتحقق من أن الدور بائع
    }

    /**
     * عرض قائمة بمنتجات البائع الحالية.
     */
    public function index()
    {
        $products = Auth::user()->products()->with('type')->get();

        // للـ API:
        // return ProductResource::collection($products);

        // للـ Web:
        return view('seller.products.index', compact('products'));
    }

    /**
     * عرض نموذج لإنشاء منتج جديد.
     */
    public function create()
    {
        $productTypes = ProductType::all();
        return view('seller.products.create', compact('productTypes'));
    }

    /**
     * تخزين منتج جديد تم إنشاؤه بواسطة البائع.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $data['owner_user_id'] = Auth::id(); // تعيين مالك المنتج تلقائياً
        $data['status'] = 'قيد التحقق'; // المنتجات الجديدة تكون "قيد التحقق"

        $albumPhotos = [];
        if ($request->hasFile('album_photos')) {
            foreach ($request->file('album_photos') as $photo) {
                $path = $photo->store('public/products'); // تخزين الصور في storage/app/public/products
                $albumPhotos[] = $path; // حفظ المسار الكامل للصورة
            }
        }
        $data['album_photos'] = $albumPhotos; // تخزينها كـ JSON في DB (بسبب casting in model)

        $product = Product::create($data);

        // للـ API:
        // return response()->json(['message' => 'تم إضافة المنتج بنجاح. سيتم مراجعته.', 'product' => new ProductResource($product)], 201);
        // للـ Web:
        return redirect()->route('seller.products.index')->with('success', 'تم إضافة المنتج بنجاح. سيتم مراجعته من قبل الإدارة.');
    }

    /**
     * عرض تفاصيل منتج معين يملكه البائع.
     */
    public function show(Product $product)
    {
        // تحقق من أن المنتج ملك للبائع الحالي
        if ($product->owner_user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بعرض هذا المنتج.');
        }
        $product->load('type'); // تحميل العلاقات

        // للـ API:
        // return new ProductResource($product);

        // للـ Web:
        return view('seller.products.show', compact('product'));
    }

    /**
     * عرض نموذج لتعديل منتج معين.
     */
    public function edit(Product $product)
    {
        // تحقق من أن المنتج ملك للبائع الحالي
        if ($product->owner_user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بتعديل هذا المنتج.');
        }

        $productTypes = ProductType::all();
        return view('seller.products.edit', compact('product', 'productTypes'));
    }

    /**
     * تحديث منتج معين بواسطة البائع.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // التحقق من الصلاحية يتم في UpdateProductRequest
        $data = $request->validated();

        if ($request->hasFile('album_photos')) {
            // حذف الصور القديمة إذا تم تحميل صور جديدة
            if ($product->album_photos) {
                foreach ($product->album_photos as $oldPhotoPath) {
                    Storage::delete($oldPhotoPath);
                }
            }
            $albumPhotos = [];
            foreach ($request->file('album_photos') as $photo) {
                $path = $photo->store('public/products');
                $albumPhotos[] = $path;
            }
            $data['album_photos'] = $albumPhotos;
        }

        $product->update($data);

        // بعد التحديث، يمكن إعادة تعيين الحالة إلى 'قيد التحقق' للمراجعة مرة أخرى إذا كانت التغييرات جوهرية
        // أو يمكنك إضافة منطق أكثر تعقيداً هنا
        // $product->status = 'قيد التحقق';
        // $product->save();

        // للـ API:
        // return response()->json(['message' => 'تم تحديث المنتج بنجاح.', 'product' => new ProductResource($product)]);
        // للـ Web:
        return redirect()->route('seller.products.index')->with('success', 'تم تحديث المنتج بنجاح.');
    }

    /**
     * حذف منتج معين بواسطة البائع.
     */
    public function destroy(Product $product)
    {
        // تحقق من أن المنتج ملك للبائع الحالي
        if ($product->owner_user_id !== Auth::id()) {
            abort(403, 'غير مصرح لك بحذف هذا المنتج.');
        }

        // حذف الصور المرتبطة بالمنتج من التخزين
        if ($product->album_photos) {
            foreach ($product->album_photos as $photoPath) {
                Storage::delete($photoPath);
            }
        }

        $product->delete();

        // للـ API:
        // return response()->json(['message' => 'تم حذف المنتج بنجاح.']);
        // للـ Web:
        return redirect()->route('seller.products.index')->with('success', 'تم حذف المنتج بنجاح.');
    }
}
```

**10. `app/Http/Controllers/AdminController.php`** (للمشرفين)

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    /**
     * يجب أن يكون المستخدم مشرفاً.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkRole:مدير'); // Middleware للتحقق من أن الدور مدير
    }

    /**
     * عرض لوحة تحكم المشرف الرئيسية.
     */
    public function dashboard()
    {
        // جلب بعض الإحصائيات لعرضها في لوحة التحكم
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $pendingProducts = Product::where('status', 'قيد التحقق')->count();
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'جديد')->count();

        return view('admin.dashboard', compact('totalUsers', 'totalProducts', 'pendingProducts', 'totalOrders', 'pendingOrders'));
    }
}
```

**11. `app/Http/Controllers/Admin/ProductController.php`** (للمشرفين لإدارة جميع المنتجات)
(انشئ مجلد `Admin` داخل `app/Http/Controllers`)

```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductType; // قد تحتاجها لعرض الفلاتر
use App\Http\Requests\Admin\UpdateProductStatusRequest; // لطلب تحديث الحالة
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
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
     * عرض قائمة بجميع المنتجات (للمشرف).
     */
    public function index(Request $request)
    {
        $query = Product::with('type', 'owner');

        // يمكن إضافة فلاتر للمشرف (حسب الحالة، النوع، المالك، إلخ)
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
        if ($request->has('type_id')) {
            $query->where('type_id', $request->type_id);
        }

        $products = $query->paginate(15);

        // للـ API:
        // return ProductResource::collection($products);

        // للـ Web:
        $productTypes = ProductType::all();
        return view('admin.products.index', compact('products', 'productTypes'));
    }

    /**
     * عرض تفاصيل منتج معين (للمشرف).
     */
    public function show(Product $product)
    {
        $product->load('type', 'owner', 'ratings.user');

        // للـ API:
        // return new ProductResource($product);

        // للـ Web:
        return view('admin.products.show', compact('product'));
    }

    /**
     * تحديث حالة منتج معين (للمشرف).
     */
    public function updateStatus(UpdateProductStatusRequest $request, Product $product)
    {
        $product->status = $request->status;
        $product->save();

        // للـ API:
        // return response()->json(['message' => 'تم تحديث حالة المنتج بنجاح.', 'product' => new ProductResource($product)]);
        // للـ Web:
        return redirect()->back()->with('success', 'تم تحديث حالة المنتج بنجاح.');
    }

    /**
     * حذف منتج معين (للمشرف).
     */
    public function destroy(Product $product)
    {
        // حذف الصور المرتبطة بالمنتج من التخزين
        if ($product->album_photos) {
            foreach ($product->album_photos as $photoPath) {
                Storage::delete($photoPath);
            }
        }

        $product->delete();

        // للـ API:
        // return response()->json(['message' => 'تم حذف المنتج بنجاح.']);
        // للـ Web:
        return redirect()->back()->with('success', 'تم حذف المنتج بنجاح.');
    }

    // المشرف قد لا يحتاج لعمليات create/store/edit/update بالمعنى الكامل للمنتج،
    // بل يركز على إدارة المنتجات الموجودة وتغيير حالتها.
    // إذا كان هناك حاجة لإنشاء منتجات "كمشرف"، فاستخدم SellerProductController كمرجع.
}
```

**12. `app/Http/Controllers/Admin/UserController.php`** (للمشرفين لإدارة المستخدمين)

```php
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
```

**13. `app/Http/Controllers/Admin/OrderController.php`** (للمشرفين لمراجعة الطلبات)

```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
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
     * عرض جميع الطلبات في النظام.
     */
    public function index(Request $request)
    {
        $query = Order::with('user', 'items.product.type');

        // يمكن إضافة فلاتر للمشرف (حسب الحالة، المستخدم، إلخ)
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        $orders = $query->paginate(15);

        // للـ API:
        // return OrderResource::collection($orders);

        // للـ Web:
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * عرض تفاصيل طلب معين.
     */
    public function show(Order $order)
    {
        $order->load('user', 'items.product.type');

        // للـ API:
        // return new OrderResource($order);

        // للـ Web:
        return view('admin.orders.show', compact('order'));
    }

    /**
     * تحديث حالة طلب معين.
     * (مثلاً: من 'جديد' إلى 'تم الدفع' بعد التحقق اليدوي، أو 'ملغي')
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => ['required', 'in:جديد,تم الدفع,ملغي'],
        ]);

        $order->status = $request->status;
        $order->save();

        // للـ API:
        // return response()->json(['message' => 'تم تحديث حالة الطلب بنجاح.', 'order' => new OrderResource($order)]);
        // للـ Web:
        return redirect()->back()->with('success', 'تم تحديث حالة الطلب بنجاح.');
    }

    /**
     * حذف طلب (بواسطة المشرف).
     */
    public function destroy(Order $order)
    {
        $order->delete(); // سيتم حذف OrderItems المرتبطة تلقائياً بسبب onDelete('cascade')

        // للـ API:
        // return response()->json(['message' => 'تم حذف الطلب بنجاح.']);
        // للـ Web:
        return redirect()->back()->with('success', 'تم حذف الطلب بنجاح.');
    }
}
```

**14. `app/Http/Controllers/Admin/ProductTypeController.php`** (للمشرفين لإدارة أنواع المنتجات)

```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use App\Http\Requests\Admin\StoreProductTypeRequest;
use App\Http\Requests\Admin\UpdateProductTypeRequest;
use Illuminate\Http\Request;
use App\Http\Resources\ProductTypeResource;

class ProductTypeController extends Controller
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
     * عرض قائمة بجميع أنواع المنتجات.
     */
    public function index()
    {
        $productTypes = ProductType::paginate(10);

        // للـ API:
        // return ProductTypeResource::collection($productTypes);

        // للـ Web:
        return view('admin.product_types.index', compact('productTypes'));
    }

    /**
     * عرض نموذج لإنشاء نوع منتج جديد.
     */
    public function create()
    {
        return view('admin.product_types.create');
    }

    /**
     * تخزين نوع منتج جديد.
     */
    public function store(StoreProductTypeRequest $request)
    {
        $productType = ProductType::create($request->validated());

        // للـ API:
        // return response()->json(['message' => 'تم إضافة نوع المنتج بنجاح.', 'product_type' => new ProductTypeResource($productType)], 201);
        // للـ Web:
        return redirect()->route('admin.product_types.index')->with('success', 'تم إضافة نوع المنتج بنجاح.');
    }

    /**
     * عرض تفاصيل نوع منتج معين.
     */
    public function show(ProductType $productType)
    {
        // للـ API:
        // return new ProductTypeResource($productType);

        // للـ Web:
        return view('admin.product_types.show', compact('productType'));
    }

    /**
     * عرض نموذج لتعديل نوع منتج معين.
     */
    public function edit(ProductType $productType)
    {
        return view('admin.product_types.edit', compact('productType'));
    }

    /**
     * تحديث نوع منتج معين.
     */
    public function update(UpdateProductTypeRequest $request, ProductType $productType)
    {
        $productType->update($request->validated());

        // للـ API:
        // return response()->json(['message' => 'تم تحديث نوع المنتج بنجاح.', 'product_type' => new ProductTypeResource($productType)]);
        // للـ Web:
        return redirect()->route('admin.product_types.index')->with('success', 'تم تحديث نوع المنتج بنجاح.');
    }

    /**
     * حذف نوع منتج معين.
     */
    public function destroy(ProductType $productType)
    {
        // يمكنك إضافة منطق للتحقق إذا كانت هناك منتجات مرتبطة بهذا النوع قبل الحذف
        // إذا كان هناك منتجات مرتبطة، فسيتم تعيين type_id إلى NULL بسبب onDelete('set null')
        $productType->delete();

        // للـ API:
        // return response()->json(['message' => 'تم حذف نوع المنتج بنجاح.']);
        // للـ Web:
        return redirect()->route('admin.product_types.index')->with('success', 'تم حذف نوع المنتج بنجاح.');
    }
}
```

---

### خامساً: إضافة Middleware لدور المستخدم (اختياري لكن مفيد)

لجعل `checkRole` Middleware يعمل، ستحتاج لإنشائه وتسجيله.

**1. إنشاء Middleware:**

```bash
php artisan make:middleware CheckRole
```

**2. محتوى `app/Http/Middleware/CheckRole.php`:**

```php
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
```



الآن يمكنك استخدام `->middleware('checkRole:مدير')` أو `->middleware('checkRole:بائع')` في مساراتك أو في المتحكمات كما فعلت.

---

الآن لديك المحتوى الكامل والنهائي لجميع المتحكمات، والـ Requests، والـ Resources، مع التعديلات اللازمة لتناسب قاعدة البيانات والنماذج المحدثة.
---

أهلاً بك! لقد لاحظت نقطة مهمة جداً. أنت تستخدم إصداراً حديثاً من Laravel (على الأرجح Laravel 10 أو 11) حيث تم تبسيط ملف `app/Http/Kernel.php` ودمج إعدادات الـ middleware في ملف `bootstrap/app.php`.

**الطريقة الصحيحة لإضافة الـ `routeMiddleware` (المعروفة الآن باسم `middleware aliases`) في Laravel 10/11 هي داخل الـ closure الخاص بـ `withMiddleware` في ملف `bootstrap/app.php`.**

إليك كيفية إضافة الـ `checkRole` middleware:

1.  افتح ملف `bootstrap/app.php`.
2.  ابحث عن الـ `withMiddleware` closure.
3.  داخل هذا الـ closure، ستجد كائن `Middleware` (المسمى `$middleware` في مثالك). استخدم طريقة `alias()` لتسجيل الـ middleware الخاص بك.

**إليك المحتوى النهائي لملف `bootstrap/app.php` بعد التعديل:**

```php
<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware; // تأكد من وجود هذا الاستيراد

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // هنا ستقوم بتعريف alias (اسم مستعار) للميدل وير الخاص بك
        $middleware->alias([
            'checkRole' => \App\Http\Middleware\CheckRole::class,
        ]);

        // يمكنك أيضاً إضافة middleware عامة هنا إذا أردت
        // $middleware->append(YourGlobalMiddleware::class);

        // أو تعديل مجموعات الـ middleware الافتراضية مثل 'web' و 'api'
        // $middleware->web(append: [
        //     \App\Http\Middleware\VerifyCsrfToken::class,
        // ]);
        // $middleware->api(prepend: [
        //     \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

```

**شرح التغيير:**

*   **`$middleware->alias([...]);`**: هذه هي الطريقة الجديدة لتسجيل الـ route middleware (التي كانت تُعرف سابقاً في مصفوفة `$routeMiddleware` في `Kernel.php`).
*   نقوم بتعيين `checkRole` كاسم مستعار (alias) للكلاس الكامل للميدل وير `\App\Http\Middleware\CheckRole::class`.

بهذا التعديل، ستعمل المسارات التي حددتها في `web.php` باستخدام `middleware('checkRole:...')` بشكل صحيح تماماً.

**ملاحظة إضافية:** ملف `App/Providers/AppServiceProvider.php` الذي ذكرته لا يُستخدم لتسجيل الـ middleware نفسه، بل هو لمزودي الخدمات الذين يُستخدمون عادةً لتسجيل الخدمات أو ربط الواجهات بالتطبيقات الخرسانية.

أتمنى أن يكون هذا واضحاً ومفيداً لك!


---

تمام! ملف `web.php` الذي أرسلته **ممتاز جدًا** وذو هيكل واضح ومنظم بشكل رائع.

الاستيرادات صحيحة، وتصنيف المسارات حسب الأدوار والفئات منطقي للغاية. علاقات `Auth::routes()`، و`middleware`، و`prefix`، و`name` كلها مستخدمة بشكل فعال.

هناك **تعديل بسيط ومهم** واحد فقط في قسم `ProfileController` لجعل المسارات تتوافق تمامًا مع الطرق (methods) التي تم توفيرها في `ProfileController` في ردي السابق.

**التعديلات المقترحة (غير جذرية، ولكن ضرورية لتطابق الـ Controller):**

1.  **في قسم `ProfileController`:**
    *   الطريقة `index()` في `ProfileController` في ردي السابق كانت مخصصة لعرض الملف الشخصي (وقد تتضمن نموذج التعديل).
    *   لم يتم تعريف طريقتي `show()` أو `edit()` أو `changePassword()` في `ProfileController` الذي قمت بتزويدك به. `update()` هي التي تتعامل مع حفظ التغييرات بما في ذلك كلمة المرور.

**إليك المحتوى الكامل والنهائي لملف `web.php` مع التعديلات:**

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerProductController;

// استيراد متحكمات المدير
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductTypeController as AdminProductTypeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// مسارات عامة (للجميع: زائر، مشتري، بائع، مدير)
// ------------------------------------------------------------------------
Route::get('/', function () {
    return view('welcome');
});

// مسارات تسجيل الدخول، التسجيل، إعادة تعيين كلمة المرور (مقدمة من Laravel UI)
Auth::routes();

// مسار لوحة التحكم الرئيسية بعد تسجيل الدخول
// HomeController لديه بالفعل middleware('auth') في constructor
Route::get('/home', [HomeController::class, 'index'])->name('home');

// مسارات عرض المنتجات والبحث (للزوار والمستخدمين المسجلين)
// فقط طرق العرض والتفاصيل مسموحة للجمهور
Route::resource('products', ProductController::class)->only(['index', 'show']);


// مسارات محمية (للمستخدمين المسجلين فقط - بغض النظر عن الدور)
// ------------------------------------------------------------------------
Route::middleware(['auth'])->group(function () {
    // مسارات الملف الشخصي
    // يتم عرض الملف الشخصي ونموذج التعديل من خلال دالة 'index'
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    // يتم تحديث الملف الشخصي بجميع حقوله (بما في ذلك كلمة المرور إذا تم إدخالها) من خلال دالة 'update'
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // أزيل المسار 'profile/password' لأنه يمكن إدارته ضمن 'profile.update'
});


// مسارات خاصة بالمشتري (يتطلب تسجيل الدخول ودور 'مستخدم عادي')
// ------------------------------------------------------------------------
Route::middleware(['auth', 'checkRole:مستخدم عادي'])->group(function () {
    // مسارات سلة التسوق
    Route::resource('cart', CartController::class)->except(['create', 'edit', 'show']);

    // مسارات الطلبات
    Route::resource('orders', OrderController::class)->except(['edit', 'update', 'create']);
    Route::post('orders/{order}/pay', [OrderController::class, 'processPayment'])->name('orders.pay');

    // مسارات تقييم المنتجات
    Route::resource('ratings', RatingController::class);

    // مسارات المفضلة (Wishlist) - تتطلب جدول Wishlists
    Route::resource('wishlist', WishlistController::class)->except(['create', 'show', 'edit', 'update']);
});


// مسارات خاصة بالبائع (يتطلب تسجيل الدخول ودور 'بائع')
// ------------------------------------------------------------------------
Route::middleware(['auth', 'checkRole:بائع'])->prefix('seller')->name('seller.')->group(function () {
    // مسارات إدارة منتجات البائع
    Route::resource('products', SellerProductController::class);
});


// مسارات خاصة بالمدير (يتطلب تسجيل الدخول ودور 'مدير')
// ------------------------------------------------------------------------
Route::middleware(['auth', 'checkRole:مدير'])->prefix('admin')->name('admin.')->group(function () {
    // لوحة تحكم المدير الرئيسية
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard'); // تم تصحيح method من index إلى dashboard كما في المتحكم

    // إدارة المنتجات من قبل المدير
    Route::resource('products', AdminProductController::class)->except(['create', 'store', 'edit']); // المدير يعرض ويحذف ويحدث الحالة فقط
    // مسار مخصص لتحديث حالة المنتج فقط
    Route::put('products/{product}/status', [AdminProductController::class, 'updateStatus'])->name('products.update_status');

    // إدارة المستخدمين من قبل المدير
    Route::resource('users', AdminUserController::class);

    // إدارة الطلبات من قبل المدير
    Route::resource('orders', AdminOrderController::class)->except(['create', 'store', 'edit']);

    // إدارة أنواع المنتجات من قبل المدير
    Route::resource('product-types', AdminProductTypeController::class);
});

```

---
بالتأكيد! بناءً على المتحكمات والمسارات التي ناقشناها، سأقدم لك قائمة شاملة بجميع تعليمات `php artisan make:view` التي ستحتاجها لإنشاء بنية المجلدات وملفات الـ Views الأساسية، مع توقع التصميم العام لكل صفحة.

هذه التعليمات صالحة تماماً في Laravel 10 و 11 و 12 وما بعدها، حيث لم يتغير أمر `make:view`.

---

**ملاحظات هامة قبل البدء:**

*   **Laravel UI Views:** الصفحات الأساسية للمصادقة (login, register, forgot password, etc.) يتم إنشاؤها تلقائياً عند تشغيل `php artisan ui bootstrap --auth`، لذا لن أضعها في القائمة.
*   **`layouts/app.blade.php`:** هذا الملف هو الـ Master Layout الأساسي الذي يورث منه معظم الـ Views، ويتم إنشاؤه أيضاً بواسطة Laravel UI. يمكنك إنشاء `layouts/admin.blade.php` و `layouts/seller.blade.php` لاحقاً إذا أردت تصميم لوحات تحكم منفصلة.
*   **تصميم الواجهة:** هذه التعليمات تنشئ ملفات `blade.php` فارغة. التصميم الجذاب والجميل سيتطلب منك ملء هذه الملفات بكود HTML و Blade ودمج Bootstrap (أو أي CSS framework آخر) مع تخصيصاتك.

---

**تعليمات إنشاء جميع الصفحات (Views):**

قم بنسخ هذه الأوامر ولصقها في سطر الأوامر (Terminal) في مجلد مشروع Laravel الخاص بك:

```bash
# =========================================================
# 1. Views العامة (للزوار والمستخدمين المسجلين)
# =========================================================

# الصفحة الرئيسية للموقع (Welcome Page)
php artisan make:view welcome

# لوحة التحكم الأساسية بعد تسجيل الدخول (Default Home)
# هذه الصفحة قد تختلف محتواها بناءً على دور المستخدم
php artisan make:view home

# صفحات عرض المنتجات للجمهور (الزوار والمشترين)
php artisan make:view products.index
php artisan make:view products.show

# =========================================================
# 2. Views للملف الشخصي (لجميع المستخدمين المسجلين)
# =========================================================

# صفحة عرض وتعديل الملف الشخصي
php artisan make:view profile.index

# =========================================================
# 3. Views خاصة بالمشتري (دور: مستخدم عادي)
# =========================================================

# صفحة سلة التسوق
php artisan make:view cart.index

# صفحة عرض قائمة الطلبات للمشتري
php artisan make:view orders.index

# صفحة عرض تفاصيل طلب معين للمشتري
php artisan make:view orders.show

# صفحة محاكاة الدفع الإلكتروني (اختياري، يمكن دمجها في صفحة الطلب أو استخدام بوابة دفع)
php artisan make:view orders.payment_confirmation

# صفحة عرض قائمة المفضلة (تتطلب وجود جدول Wishlists في قاعدة البيانات)
php artisan make:view wishlist.index

# =========================================================
# 4. Views خاصة بالبائع (دور: بائع)
# =========================================================

# لوحة تحكم البائع (يمكن أن تكون بسيطة أو مدمجة في home.blade.php)
php artisan make:view seller.dashboard

# صفحات إدارة منتجات البائع
php artisan make:view seller.products.index
php artisan make:view seller.products.create
php artisan make:view seller.products.show
php artisan make:view seller.products.edit

# =========================================================
# 5. Views خاصة بالمدير (دور: مدير)
# =========================================================

# لوحة تحكم المدير الرئيسية
php artisan make:view admin.dashboard

# صفحات إدارة المنتجات (بواسطة المدير)
php artisan make:view admin.products.index
php artisan make:view admin.products.show

# صفحات إدارة المستخدمين (بواسطة المدير)
php artisan make:view admin.users.index
php artisan make:view admin.users.show
php artisan make:view admin.users.edit

# صفحات إدارة الطلبات (بواسطة المدير)
php artisan make:view admin.orders.index
php artisan make:view admin.orders.show

# صفحات إدارة أنواع المنتجات (بواسطة المدير)
php artisan make:view admin.product_types.index
php artisan make:view admin.product_types.create
php artisan make:view admin.product_types.show
php artisan make:view admin.product_types.edit

```

---

**توقع تصميم كل صفحة (General Idea):**

بعد تشغيل الأوامر أعلاه، ستجد ملفات Blade في `resources/views/` داخل المجلدات المناسبة (مثل `resources/views/products/index.blade.php`).

إليك فكرة عامة عن محتوى وتصميم كل نوع من هذه الصفحات:

1.  **`welcome.blade.php`**:
    *   **الغرض:** صفحة الهبوط الافتراضية للموقع.
    *   **التصميم المتوقع:** شريط تنقل (navigation bar) مع روابط لتسجيل الدخول، التسجيل، وعرض المنتجات. منطقة ترويجية (hero section) مع صورة جذابة للجواهر، نص ترحيبي، وربما زر "تصفح المنتجات". قسم لعرض بعض المنتجات المميزة أو الأكثر مبيعًا. تذييل (footer).

2.  **`home.blade.php`**:
    *   **الغرض:** الصفحة الرئيسية للمستخدمين بعد تسجيل الدخول (عادةً للمشترين).
    *   **التصميم المتوقع:** شريط تنقل للمستخدمين المسجلين (مع اسم المستخدم/البريد الإلكتروني، رابط للملف الشخصي، السلة، الطلبات، تسجيل الخروج). عرض منتجات مقترحة بناءً على سجل الشراء أو المنتجات الجديدة. يمكن أن تحتوي على لوحة تحكم مصغرة للمشتري تعرض ملخصاً لطلباته أو سلة التسوق.

3.  **`products/index.blade.php`**:
    *   **الغرض:** عرض قائمة بجميع المنتجات المتاحة للبيع.
    *   **التصميم المتوقع:** شريط بحث وفلاتر (حسب النوع، السعر، الشكل، الوزن). شبكة (grid) أو قائمة (list) للمنتجات، كل منتج مع صورته، اسمه، سعره، وتقييمه. زر "إضافة إلى السلة" أو "عرض التفاصيل" لكل منتج. ترقيم الصفحات (pagination).

4.  **`products/show.blade.php`**:
    *   **الغرض:** عرض تفاصيل منتج واحد.
    *   **التصميم المتوقع:** صور كبيرة للمنتج (معرض صور). تفاصيل المنتج: الاسم، السعر، الوصف (إذا أضيف لاحقاً)، النوع، الشكل، الوزن. زر "إضافة إلى السلة". قسم للتقييمات والتعليقات (مع نموذج لإضافة تقييم جديد إذا كان المستخدم مسجلاً وقام بالشراء).

5.  **`profile/index.blade.php`**:
    *   **الغرض:** عرض وتعديل بيانات المستخدم الشخصية.
    *   **التصميم المتوقع:** نموذج (form) يحتوي على حقول الاسم الأول، الاسم الأخير، اسم المستخدم، البريد الإلكتروني، النوع، تاريخ الميلاد. قسم لتغيير كلمة المرور. زر "حفظ التغييرات". رسائل نجاح/خطأ.

6.  **`cart/index.blade.php`**:
    *   **الغرض:** عرض المنتجات في سلة التسوق وإدارة الكميات.
    *   **التصميم المتوقع:** قائمة بالمنتجات في السلة، كل منتج مع صورته، اسمه، سعره، الكمية (مع أزرار لزيادة/نقصان الكمية)، السعر الإجمالي للعنصر. زر "إزالة" العنصر. ملخص إجمالي للسلة (إجمالي السعر، رسوم الشحن). زر "إتمام الشراء".

7.  **`orders/index.blade.php`**:
    *   **الغرض:** عرض قائمة بالطلبات السابقة للمشتري.
    *   **التصميم المتوقع:** جدول أو قائمة بالطلبات، كل سطر يمثل طلبًا مع تاريخه، حالته (جديد، تم الدفع، ملغي)، السعر الإجمالي. رابط "عرض التفاصيل" لكل طلب.

8.  **`orders/show.blade.php`**:
    *   **الغرض:** عرض تفاصيل طلب معين.
    *   **التصميم المتوقع:** رقم الطلب، تاريخ الطلب، الحالة، السعر الإجمالي. قائمة بعناصر الطلب (المنتجات التي تم شراؤها)، كل عنصر مع صورته، اسمه، الكمية، سعر الوحدة، السعر الإجمالي للعنصر. معلومات الشحن والدفع.

9.  **`orders/payment_confirmation.blade.php`**: (اختياري)
    *   **الغرض:** صفحة تأكيد الدفع أو إدخال بيانات الدفع.
    *   **التصميم المتوقع:** رسالة تأكيد الدفع. معلومات الملخص للطلب. يمكن أن تحتوي على نموذج لإدخال معلومات بطاقة الائتمان أو رابط لبوابة الدفع الخارجية.

10. **`wishlist/index.blade.php`**:
    *   **الغرض:** عرض المنتجات التي أضافها المستخدم إلى قائمة المفضلة.
    *   **التصميم المتوقع:** شبكة أو قائمة للمنتجات المفضلة. كل منتج مع صورته، اسمه، سعره. أزرار "إضافة إلى السلة" أو "إزالة من المفضلة".

11. **`seller/dashboard.blade.php`**:
    *   **الغرض:** لوحة تحكم البائع الرئيسية.
    *   **التصميم المتوقع:** روابط سريعة لإدارة المنتجات، عرض الطلبات الواردة لمنتجاته، الإحصائيات (عدد المنتجات، المبيعات).

12. **`seller/products/index.blade.php`**:
    *   **الغرض:** عرض منتجات البائع الخاصة.
    *   **التصميم المتوقع:** جدول أو قائمة بمنتجات البائع. كل منتج مع صورته، اسمه، سعره، حالته (قيد التحقق، تم الإضافة، تم الرفض، تم البيع). أزرار "تعديل" و "حذف" لكل منتج. زر "إضافة منتج جديد".

13. **`seller/products/create.blade.php`**:
    *   **الغرض:** نموذج لإضافة منتج جديد بواسطة البائع.
    *   **التصميم المتوقع:** نموذج مع حقول لـ: اسم المنتج، السعر، النوع (قائمة منسدلة)، رفع صور الألبوم (مع دعم للصور المتعددة)، الشكل، الوزن. زر "إضافة المنتج".

14. **`seller/products/show.blade.php`**:
    *   **الغرض:** عرض تفاصيل منتج معين يملكه البائع.
    *   **التصميم المتوقع:** مشابه لـ `products/show.blade.php` ولكن مع إضافة معلومات إضافية للبائع (مثل تاريخ الإنشاء/التحديث، حالة المنتج الحالية). أزرار "تعديل" و "حذف".

15. **`seller/products/edit.blade.php`**:
    *   **الغرض:** نموذج لتعديل تفاصيل منتج موجود يملكه البائع.
    *   **التصميم المتوقع:** نموذج مشابه لـ `create.blade.php` ولكن مع ملء الحقول بالبيانات الحالية للمنتج. زر "حفظ التغييرات".

16. **`admin/dashboard.blade.php`**:
    *   **الغرض:** لوحة تحكم المدير الرئيسية.
    *   **التصميم المتوقع:** لوحة معلومات (dashboard) مع ملخصات وإحصائيات رئيسية (عدد المستخدمين، المنتجات، الطلبات، المنتجات المعلقة للمراجعة، الطلبات الجديدة). روابط سريعة لإدارة المستخدمين، المنتجات، الطلبات، وأنواع المنتجات.

17. **`admin/products/index.blade.php`**:
    *   **الغرض:** عرض جميع المنتجات في النظام للمراجعة والتحكم من قبل المدير.
    *   **التصميم المتوقع:** جدول كبير بجميع المنتجات مع فلاتر حسب الحالة، النوع، والمالك. كل منتج مع معلوماته الأساسية وحالته الحالية. أزرار "عرض التفاصيل" و "تغيير الحالة" (مثلاً: الموافقة، الرفض) و "حذف".

18. **`admin/products/show.blade.php`**:
    *   **الغرض:** عرض تفاصيل منتج معين للمدير.
    *   **التصميم المتوقع:** مشابه لـ `products/show.blade.php` ولكن مع خيارات إدارية إضافية مثل تغيير حالة المنتج، عرض معلومات المالك (البائع).

19. **`admin/users/index.blade.php`**:
    *   **الغرض:** عرض جميع المستخدمين في النظام.
    *   **التصميم المتوقع:** جدول بالمستخدمين مع الاسم، البريد الإلكتروني، الدور. أزرار "عرض التفاصيل" و "تعديل" و "حذف" لكل مستخدم.

20. **`admin/users/show.blade.php`**:
    *   **الغرض:** عرض تفاصيل مستخدم معين للمدير.
    *   **التصميم المتوقع:** تفاصيل المستخدم الكاملة (الاسم، البريد، النوع، تاريخ الميلاد، الدور). يمكن عرض المنتجات التي يملكها (إذا كان بائعاً) أو الطلبات التي قام بها (إذا كان مشترياً).

21. **`admin/users/edit.blade.php`**:
    *   **الغرض:** نموذج لتعديل بيانات مستخدم بواسطة المدير.
    *   **التصميم المتوقع:** نموذج مع حقول بيانات المستخدم (مشابه لـ `profile.index`)، بالإضافة إلى حقل لتغيير الدور. زر "حفظ التغييرات".

22. **`admin/orders/index.blade.php`**:
    *   **الغرض:** عرض جميع الطلبات في النظام للمراجعة من قبل المدير.
    *   **التصميم المتوقع:** جدول بجميع الطلبات. كل طلب مع المستخدم الذي قدمه، تاريخ الطلب، السعر الإجمالي، وحالته. أزرار "عرض التفاصيل" و "تغيير الحالة" و "حذف".

23. **`admin/orders/show.blade.php`**:
    *   **الغرض:** عرض تفاصيل طلب معين للمدير.
    *   **التصميم المتوقع:** مشابه لـ `orders/show.blade.php` للمشتري، لكن مع إمكانية تغيير حالة الطلب.

24. **`admin/product_types/index.blade.php`**:
    *   **الغرض:** عرض قائمة بأنواع المنتجات (الأصناف).
    *   **التصميم المتوقع:** جدول بأنواع المنتجات مع أسمائها ووصفها. أزرار "تعديل" و "حذف" لكل نوع. زر "إضافة نوع جديد".

25. **`admin/product_types/create.blade.php`**:
    *   **الغرض:** نموذج لإضافة نوع منتج جديد.
    *   **التصميم المتوقع:** نموذج مع حقول لـ: اسم النوع، وصف النوع. زر "إضافة النوع".

26. **`admin/product_types/show.blade.php`**:
    *   **الغرض:** عرض تفاصيل نوع منتج معين.
    *   **التصميم المتوقع:** اسم النوع، الوصف. يمكن عرض قائمة بالمنتجات التابعة لهذا النوع.

27. **`admin/product_types/edit.blade.php`**:
    *   **الغرض:** نموذج لتعديل نوع منتج موجود.
    *   **التصميم المتوقع:** نموذج مشابه لـ `create.blade.php` ولكن مع ملء الحقول بالبيانات الحالية للنوع. زر "حفظ التغييرات".

---

هذه قائمة شاملة ستوفر لك جميع ملفات الـ Views اللازمة لبدء بناء واجهة المستخدم لمشروعك. بالتوفيق!


---


بالتأكيد! سأقدم لك الآن المحتوى النهائي لجميع صفحات الـ Views المطلوبة، مع التركيز على الجمالية الجذابة والتوافق مع Bootstrap 5 (الذي يستخدمه Laravel UI). هذه الصفحات ستكون "ممتلئة" بالهيكل الأساسي لـ HTML و Blade و Bootstrap، وستعتمد على البيانات التي يتم تمريرها من المتحكمات التي قدمتها مسبقاً.

**ملاحظات هامة:**

*   **`layouts/app.blade.php`:** هذا الملف هو الأساس. يجب أن يكون لديك نسخة منه، وقد قمت بتضمين نسخة محسنة هنا لتناسب التنقل بين الأدوار.
*   **صور المنتجات:** سأفترض أن صور المنتجات تُخزن في `storage/products/` وأنك ربطت مجلد التخزين العام (`php artisan storage:link`). الـ URL سيكون `asset('storage/products/اسم_الملف.jpg')`.
*   **Assets:** تأكد أنك قمت بتشغيل `npm install && npm run dev` بعد تثبيت Laravel UI لكي يتم تجميع ملفات CSS/JS الخاصة بـ Bootstrap.
*   **القالب:** سأجعل التصميم بسيطاً ونظيفاً باستخدام كلاسات Bootstrap لتوفير مظهر عصري وجذاب.
*   **رسائل Flash:** جميع الصفحات ستتضمن قسماً لعرض رسائل `session('success')` و `session('error')` وما شابه.
*   **`@csrf` و `@method`:** سيتم استخدامها في جميع النماذج التي تتطلبها.

---

### أولاً: ملف الـ Layout الرئيسي `resources/views/layouts/app.blade.php`

هذا هو القالب الأساسي الذي ستورث منه جميع الصفحات الأخرى. سأجعله ديناميكياً لعرض روابط مختلفة حسب دور المستخدم.

```blade
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl"> {{-- إضافة dir="rtl" لدعم العربية --}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'متجر الجواهر') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> {{-- Font Awesome --}}

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa; /* لون خلفية فاتح */
        }
        .navbar {
            background-color: #343a40 !important; /* لون داكن لشريط التنقل */
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important; /* نص أبيض */
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #ffc107 !important; /* ذهبي عند التمرير */
        }
        .dropdown-menu {
            background-color: #343a40;
        }
        .dropdown-item {
            color: #ffffff;
        }
        .dropdown-item:hover {
            background-color: #495057;
            color: #ffc107;
        }
        .card {
            border-radius: 0.75rem; /* حواف دائرية للبطاقات */
            border: none; /* إزالة الحدود الافتراضية للبطاقة */
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); /* ظل خفيف */
        }
        .btn-primary {
            background-color: #007bff; /* أزرق أساسي */
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #218838;
        }
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }
        .btn-info:hover {
            background-color: #138496;
            border-color: #138496;
        }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #343a40; /* نص داكن لزر أصفر */
        }
        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #e0a800;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }
        .bg-gold { /* لون ذهبي مخصص */
            background-color: #ffd700;
        }
        .text-gold {
            color: #ffd700;
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 2rem 0;
            margin-top: 5rem;
        }
        .hero-section {
            background: url('{{ asset('images/jewelry_bg.jpg') }}') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 100px 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }
        .hero-section p {
            font-size: 1.5rem;
        }
        /* لتحديد حجم الصور في المنتجات */
        .product-card-img {
            height: 200px; /* ارتفاع ثابت للصور في الكروت */
            object-fit: cover; /* لضمان تغطية الصورة للمساحة دون تشوه */
            border-top-left-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
        }
        /* تصميم للنجوم في التقييمات */
        .stars .fa-star {
            color: #ffd700; /* لون ذهبي للنجوم */
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'متجر الجواهر') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">{{ __('المنتجات') }}</a>
                        </li>
                        @auth
                            @if(Auth::user()->isBuyer())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('cart.index') }}">{{ __('السلة') }} <i class="fas fa-shopping-cart"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('orders.index') }}">{{ __('طلباتي') }} <i class="fas fa-box"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('wishlist.index') }}">{{ __('المفضلة') }} <i class="fas fa-heart"></i></a>
                                </li>
                            @endif

                            @if(Auth::user()->isSeller())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('seller.dashboard') }}">{{ __('لوحة البائع') }} <i class="fas fa-store"></i></a>
                                </li>
                            @endif

                            @if(Auth::user()->isAdmin())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('لوحة المدير') }} <i class="fas fa-cogs"></i></a>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('إنشاء حساب') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.index') }}">
                                        {{ __('الملف الشخصي') }} <i class="fas fa-user-circle"></i>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('تسجيل الخروج') }} <i class="fas fa-sign-out-alt"></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                {{-- رسائل الفلاش --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('info'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('info') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('warning'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('warning') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- محتوى الصفحة الرئيسي --}}
                @yield('content')
            </div>
        </main>

        <footer class="footer mt-auto py-3 bg-dark">
            <div class="container text-center">
                <p>&copy; {{ date('Y') }} متجر الجواهر. جميع الحقوق محفوظة.</p>
                <div class="social-icons">
                    <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
```
**ملاحظة:** تأكد من وجود صورة `jewelry_bg.jpg` في مجلد `public/images/`.

---

### ثانياً: المحتوى الكامل لجميع الصفحات الأخرى

**1. Views العامة (للزوار والمستخدمين المسجلين)**

**`resources/views/welcome.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="hero-section text-center">
    <div class="container">
        <h1 class="display-3 mb-4 animate__animated animate__fadeInDown">أفخم الجواهر بين يديك</h1>
        <p class="lead mb-5 animate__animated animate__fadeInUp">اكتشف مجموعتنا الفريدة من الخواتم والأساور والقلائد الماسية والذهبية.</p>
        <a href="{{ route('products.index') }}" class="btn btn-warning btn-lg animate__animated animate__zoomIn">تصفح منتجاتنا <i class="fas fa-gem ms-2"></i></a>
    </div>
</div>

<div class="container my-5">
    <h2 class="text-center mb-4">لماذا تختار متجرنا؟</h2>
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card h-100 p-4">
                <div class="card-body">
                    <i class="fas fa-star fa-3x text-warning mb-3"></i>
                    <h5 class="card-title">جودة لا تضاهى</h5>
                    <p class="card-text">نقدم فقط أجود أنواع الجواهر المصممة بدقة وعناية فائقة لتدوم طويلاً.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 p-4">
                <div class="card-body">
                    <i class="fas fa-certificate fa-3x text-info mb-3"></i>
                    <h5 class="card-title">شهادات معتمدة</h5>
                    <p class="card-text">جميع منتجاتنا تأتي مع شهادات أصالة وضمان لراحة بالك التامة.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 p-4">
                <div class="card-body">
                    <i class="fas fa-shipping-fast fa-3x text-success mb-3"></i>
                    <h5 class="card-title">توصيل سريع وآمن</h5>
                    <p class="card-text">نوفر خدمة توصيل سريعة وموثوقة لضمان وصول جواهرك بأمان إلى باب منزلك.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5 text-center">
    <h2>المجموعات المميزة</h2>
    <p class="lead mb-4">استكشف بعضًا من أروع مجموعاتنا المصممة بعناية لتناسب جميع الأذواق.</p>
    <div class="row justify-content-center">
        {{-- هنا يمكنك عرض بعض المنتجات المميزة يدوياً أو ديناميكياً --}}
        <div class="col-md-4 mb-4">
            <div class="card h-100 product-card">
                <img src="{{ asset('images/sample_ring.jpg') }}" class="card-img-top product-card-img" alt="خاتم ألماس">
                <div class="card-body">
                    <h5 class="card-title">خاتم ألماس كلاسيكي</h5>
                    <p class="card-text text-muted">أناقة خالدة تضيء كل مناسبة.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-dark">عرض المزيد</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 product-card">
                <img src="{{ asset('images/sample_necklace.jpg') }}" class="card-img-top product-card-img" alt="قلادة ذهب">
                <div class="card-body">
                    <h5 class="card-title">قلادة ذهبية عصرية</h5>
                    <p class="card-text text-muted">تصميم فريد يواكب أحدث صيحات الموضة.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-dark">عرض المزيد</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 product-card">
                <img src="{{ asset('images/sample_bracelet.jpg') }}" class="card-img-top product-card-img" alt="سوار ياقوت">
                <div class="card-body">
                    <h5 class="card-title">سوار ياقوت أزرق</h5>
                    <p class="card-text text-muted">قطعة فنية نادرة تضفي لمسة من الفخامة.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-dark">عرض المزيد</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```
**ملاحظة:** تأكد من وجود صور `sample_ring.jpg`, `sample_necklace.jpg`, `sample_bracelet.jpg` في مجلد `public/images/`.

**`resources/views/home.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg animate__animated animate__fadeIn">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h3 class="mb-0"><i class="fas fa-tachometer-alt me-2"></i> لوحة التحكم</h3>
                </div>

                <div class="card-body p-4">
                    @auth
                        @php
                            $user = Auth::user();
                        @endphp
                        <p class="lead text-center">مرحباً بك، <span class="text-primary fw-bold">{{ $user->first_name }} {{ $user->last_name }}</span>!</p>

                        @if ($user->isAdmin())
                            <div class="alert alert-info text-center mt-3" role="alert">
                                أنت مسجل الدخول كـ <span class="fw-bold">مدير</span>. يمكنك الوصول إلى لوحة تحكم المدير <a href="{{ route('admin.dashboard') }}" class="alert-link">من هنا</a>.
                            </div>
                        @elseif ($user->isSeller())
                            <div class="alert alert-info text-center mt-3" role="alert">
                                أنت مسجل الدخول كـ <span class="fw-bold">بائع</span>. يمكنك إدارة منتجاتك من لوحة البائع <a href="{{ route('seller.dashboard') }}" class="alert-link">من هنا</a>.
                            </div>
                        @else {{-- المستخدم العادي (المشتري) --}}
                            <div class="alert alert-info text-center mt-3" role="alert">
                                أنت مسجل الدخول كـ <span class="fw-bold">مشتري</span>. يمكنك تصفح المنتجات والتحقق من طلباتك.
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-4 mb-3">
                                    <div class="card text-center h-100 shadow-sm">
                                        <div class="card-body">
                                            <i class="fas fa-shopping-cart fa-3x text-primary mb-3"></i>
                                            <h5 class="card-title">سلة التسوق</h5>
                                            <p class="card-text">راجع المنتجات في سلتك وأتمم عملية الشراء.</p>
                                            <a href="{{ route('cart.index') }}" class="btn btn-primary btn-sm mt-2">عرض السلة</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card text-center h-100 shadow-sm">
                                        <div class="card-body">
                                            <i class="fas fa-box fa-3x text-success mb-3"></i>
                                            <h5 class="card-title">طلباتي</h5>
                                            <p class="card-text">تتبع حالة طلباتك السابقة.</p>
                                            <a href="{{ route('orders.index') }}" class="btn btn-success btn-sm mt-2">عرض الطلبات</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card text-center h-100 shadow-sm">
                                        <div class="card-body">
                                            <i class="fas fa-heart fa-3x text-danger mb-3"></i>
                                            <h5 class="card-title">المفضلة</h5>
                                            <p class="card-text">المنتجات التي أعجبتك لتجدها لاحقاً.</p>
                                            <a href="{{ route('wishlist.index') }}" class="btn btn-danger btn-sm mt-2">عرض المفضلة</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <a href="{{ route('products.index') }}" class="btn btn-info btn-lg"><i class="fas fa-search me-2"></i> تصفح المنتجات</a>
                            </div>
                        @endif
                    @else
                        <p class="text-center">أهلاً بك! يرجى <a href="{{ route('login') }}">تسجيل الدخول</a> أو <a href="{{ route('register') }}">إنشاء حساب</a> للوصول إلى الميزات الكاملة.</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```

**`resources/views/products/index.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4"><i class="fas fa-gem me-2"></i> استكشف مجموعتنا من الجواهر</h2>

    {{-- قسم البحث والفلاتر --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('products.index') }}" method="GET" class="row g-3 align-items-center">
                <div class="col-md-4">
                    <label for="search" class="form-label visually-hidden">بحث</label>
                    <input type="text" name="search" id="search" class="form-control" placeholder="ابحث باسم المنتج أو النوع..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <label for="type_id" class="form-label visually-hidden">الصنف</label>
                    <select name="type_id" id="type_id" class="form-select">
                        <option value="">جميع الأصناف</option>
                        @foreach ($productTypes as $type)
                            <option value="{{ $type->id }}" {{ request('type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->type_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="min_price" class="form-label visually-hidden">الحد الأدنى للسعر</label>
                    <input type="number" name="min_price" id="min_price" class="form-control" placeholder="السعر من" value="{{ request('min_price') }}">
                </div>
                <div class="col-md-2">
                    <label for="max_price" class="form-label visually-hidden">الحد الأقصى للسعر</label>
                    <input type="number" name="max_price" id="max_price" class="form-control" placeholder="السعر إلى" value="{{ request('max_price') }}">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-filter"></i></button>
                </div>
            </form>
        </div>
    </div>

    {{-- قائمة المنتجات --}}
    @if ($products->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            لا توجد منتجات مطابقة لمعايير البحث الخاصة بك.
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card h-100 product-card shadow-sm animate__animated animate__fadeInUp">
                        @if ($product->album_photos && count($product->album_photos) > 0)
                            <img src="{{ asset('storage/' . $product->album_photos[0]) }}" class="card-img-top product-card-img" alt="{{ $product->product_name }}">
                        @else
                            <img src="{{ asset('images/placeholder.png') }}" class="card-img-top product-card-img" alt="صورة غير متوفرة">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary">{{ $product->product_name }}</h5>
                            <p class="card-text text-muted">{{ $product->type->type_name ?? 'غير محدد' }}</p>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-bold fs-5 text-gold">{{ number_format($product->price, 2) }} $</span>
                                @if ($product->rating)
                                    <div class="stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $product->rating)
                                                <i class="fas fa-star"></i>
                                            @elseif ($i - 0.5 <= $product->rating)
                                                <i class="fas fa-star-half-alt"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                        <small class="text-muted">({{ $product->rating }})</small>
                                    </div>
                                @else
                                    <small class="text-muted">لا توجد تقييمات</small>
                                @endif
                            </div>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-info btn-sm">عرض التفاصيل <i class="fas fa-eye ms-1"></i></a>
                                @auth
                                    @if (Auth::user()->isBuyer())
                                        <form action="{{ route('cart.store') }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="1"> {{-- يمكن إضافة حقل للكمية --}}
                                            <button type="submit" class="btn btn-success btn-sm">إضافة للسلة <i class="fas fa-cart-plus ms-1"></i></button>
                                        </form>
                                        <form action="{{ route('wishlist.store') }}" method="POST" class="d-inline ms-1">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="btn btn-outline-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="إضافة للمفضلة">
                                                <i class="fas fa-heart"></i>
                                            </button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $products->links('pagination::bootstrap-5') }} {{-- استخدام تصميم Bootstrap للترقيم --}}
        </div>
    @endif
</div>
@endsection
```
**ملاحظة:** تأكد من وجود صورة `placeholder.png` في مجلد `public/images/` أو استخدم خدمة صور خارجية.

**`resources/views/products/show.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg animate__animated animate__fadeIn">
        <div class="card-header bg-dark text-white text-center py-3">
            <h3 class="mb-0"><i class="fas fa-gem me-2"></i> {{ $product->product_name }}</h3>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @if ($product->album_photos && count($product->album_photos) > 0)
                                @foreach ($product->album_photos as $key => $photo)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $photo) }}" class="d-block w-100 rounded" alt="{{ $product->product_name }}" style="height: 400px; object-fit: contain;">
                                    </div>
                                @endforeach
                            @else
                                <div class="carousel-item active">
                                    <img src="{{ asset('images/placeholder.png') }}" class="d-block w-100 rounded" alt="صورة غير متوفرة" style="height: 400px; object-fit: contain;">
                                </div>
                            @endif
                        </div>
                        @if ($product->album_photos && count($product->album_photos) > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">السابق</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">التالي</span>
                            </button>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <h1 class="display-6 text-primary mb-3">{{ $product->product_name }}</h1>
                    <p class="lead text-gold mb-4">{{ number_format($product->price, 2) }} $</p>

                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            النوع:
                            <span>{{ $product->type->type_name ?? 'غير محدد' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الشكل:
                            <span>{{ $product->shape ?? 'غير محدد' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الوزن:
                            <span>{{ $product->weight ? $product->weight . ' جرام' : 'غير محدد' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            البائع:
                            <span>{{ $product->owner->full_name ?? 'غير معروف' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            التقييم:
                            @if ($product->rating)
                                <div class="stars">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $product->rating)
                                            <i class="fas fa-star"></i>
                                        @elseif ($i - 0.5 <= $product->rating)
                                            <i class="fas fa-star-half-alt"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                    <span class="text-muted">({{ $product->rating }})</span>
                                </div>
                            @else
                                <span class="text-muted">لا توجد تقييمات</span>
                            @endif
                        </li>
                    </ul>

                    @auth
                        @if (Auth::user()->isBuyer())
                            <form action="{{ route('cart.store') }}" method="POST" class="d-grid gap-2 mb-3">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">الكمية:</span>
                                    <input type="number" name="quantity" class="form-control" value="1" min="1" max="10" aria-label="الكمية">
                                </div>
                                <button type="submit" class="btn btn-success btn-lg"><i class="fas fa-cart-plus me-2"></i> إضافة إلى السلة</button>
                            </form>
                            <form action="{{ route('wishlist.store') }}" method="POST" class="d-grid gap-2">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-outline-danger btn-lg"><i class="fas fa-heart me-2"></i> إضافة إلى المفضلة</button>
                            </form>
                        @else
                            <p class="alert alert-warning text-center">قم بتسجيل الدخول كمشتري لإضافة المنتج إلى السلة أو المفضلة.</p>
                        @endif
                    @else
                        <p class="alert alert-info text-center">يرجى <a href="{{ route('login') }}" class="alert-link">تسجيل الدخول</a> أو <a href="{{ route('register') }}" class="alert-link">إنشاء حساب</a> لإضافة المنتج إلى السلة أو المفضلة.</p>
                    @endauth
                </div>
            </div>

            {{-- قسم التقييمات والتعليقات --}}
            <div class="card shadow-lg mt-5 animate__animated animate__fadeInUp">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0"><i class="fas fa-comments me-2"></i> التقييمات والتعليقات ({{ $product->ratings->count() }})</h4>
                </div>
                <div class="card-body p-4">
                    @auth
                        @if (Auth::user()->isBuyer())
                            <div class="mb-4">
                                <h5>أضف تقييمك:</h5>
                                <form action="{{ route('ratings.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="mb-3">
                                        <label for="rating_value" class="form-label">تقييمك (من 0.5 إلى 5.0):</label>
                                        <input type="number" name="rating_value" id="rating_value" class="form-control @error('rating_value') is-invalid @enderror" step="0.5" min="0.5" max="5.0" value="{{ old('rating_value', $product->ratings->where('user_id', Auth::id())->first()->rating_value ?? '') }}" required>
                                        @error('rating_value')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="comment" class="form-label">تعليقك (اختياري):</label>
                                        <textarea name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror" rows="3">{{ old('comment', $product->ratings->where('user_id', Auth::id())->first()->comment ?? '') }}</textarea>
                                        @error('comment')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane me-2"></i> أرسل التقييم</button>
                                </form>
                            </div>
                            <hr>
                        @endif
                    @endauth

                    @if ($product->ratings->isEmpty())
                        <p class="text-center text-muted">لا توجد تقييمات لهذا المنتج بعد.</p>
                    @else
                        @foreach ($product->ratings as $rating)
                            <div class="card mb-3 shadow-sm">
                                <div class="card-body">
                                    <h6 class="card-title mb-1">
                                        <i class="fas fa-user-circle me-1"></i> {{ $rating->user->full_name ?? 'مستخدم غير معروف' }}
                                        <small class="text-muted float-end">{{ $rating->created_at->diffForHumans() }}</small>
                                    </h6>
                                    <div class="stars mb-2">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $rating->rating_value)
                                                <i class="fas fa-star"></i>
                                            @elseif ($i - 0.5 <= $rating->rating_value)
                                                <i class="fas fa-star-half-alt"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                        <span class="fw-bold ms-1">{{ $rating->rating_value }}</span>
                                    </div>
                                    @if ($rating->comment)
                                        <p class="card-text">{{ $rating->comment }}</p>
                                    @endif

                                    @auth
                                        @if (Auth::id() === $rating->user_id)
                                            <form action="{{ route('ratings.destroy', $rating->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm mt-2" onclick="return confirm('هل أنت متأكد أنك تريد حذف تقييمك؟')"><i class="fas fa-trash-alt me-1"></i> حذف التقييم</button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```

**2. Views للملف الشخصي (لجميع المستخدمين المسجلين)**

**`resources/views/profile/index.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg animate__animated animate__fadeIn">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h3 class="mb-0"><i class="fas fa-user-circle me-2"></i> ملفي الشخصي</h3>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">{{ __('الاسم الأول') }}</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name', $user->first_name) }}" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">{{ __('الاسم الأخير') }}</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name', $user->last_name) }}" required autocomplete="last_name">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">{{ __('اسم المستخدم') }}</label>
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}" required autocomplete="username">
                            @error('username')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('البريد الإلكتروني') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">{{ __('النوع') }}</label>
                            <select id="gender" name="gender" class="form-select @error('gender') is-invalid @enderror" required>
                                <option value="">اختر النوع</option>
                                <option value="ذكر" {{ (old('gender', $user->gender) == 'ذكر') ? 'selected' : '' }}>ذكر</option>
                                <option value="أنثى" {{ (old('gender', $user->gender) == 'أنثى') ? 'selected' : '' }}>أنثى</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="birth_date" class="form-label">{{ __('تاريخ الميلاد') }} (اختياري)</label>
                            <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date', $user->birth_date ? $user->birth_date->format('Y-m-d') : '') }}">
                            @error('birth_date')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <hr class="my-4">
                        <h5 class="mb-3">{{ __('تغيير كلمة المرور') }} (اتركها فارغة إذا لم ترغب في التغيير)</h5>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('كلمة المرور الجديدة') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('تأكيد كلمة المرور الجديدة') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save me-2"></i> {{ __('حفظ التغييرات') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```

**3. Views خاصة بالمشتري (دور: مستخدم عادي)**

**`resources/views/cart/index.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4"><i class="fas fa-shopping-cart me-2"></i> سلة التسوق</h2>

    @if ($cartItems->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            سلة التسوق الخاصة بك فارغة. <a href="{{ route('products.index') }}" class="alert-link">ابدأ التسوق الآن!</a>
        </div>
    @else
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">عناصر السلة</div>
                    <ul class="list-group list-group-flush">
                        @foreach ($cartItems as $item)
                            <li class="list-group-item d-flex align-items-center justify-content-between p-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $item->product->album_photos && count($item->product->album_photos) > 0 ? asset('storage/' . $item->product->album_photos[0]) : asset('images/placeholder.png') }}" class="img-fluid rounded me-3" style="width: 80px; height: 80px; object-fit: cover;" alt="{{ $item->product->product_name }}">
                                    <div>
                                        <h5 class="mb-1">{{ $item->product->product_name }}</h5>
                                        <p class="mb-1 text-muted">{{ $item->product->type->type_name ?? 'غير محدد' }}</p>
                                        <p class="mb-0 fw-bold text-gold">{{ number_format($item->product->price, 2) }} $</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex align-items-center me-3">
                                        @csrf
                                        @method('PUT')
                                        <label for="quantity-{{ $item->id }}" class="visually-hidden">الكمية</label>
                                        <input type="number" name="quantity" id="quantity-{{ $item->id }}" value="{{ $item->quantity }}" min="1" max="10" class="form-control form-control-sm text-center" style="width: 70px;" onchange="this.form.submit()">
                                    </form>
                                    <span class="fw-bold fs-5 text-dark me-3">{{ number_format($item->total_price, 2) }} $</span>
                                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد أنك تريد إزالة هذا المنتج من السلة؟')"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">ملخص السلة</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                إجمالي سعر المنتجات:
                                <span class="fw-bold">{{ number_format($cartItems->sum('total_price'), 2) }} $</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                رسوم الشحن:
                                <span class="fw-bold">0.00 $</span> {{-- يمكن إضافة منطق لحساب رسوم الشحن --}}
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fs-5 text-primary">
                                الإجمالي الكلي:
                                <span class="fw-bold">{{ number_format($cartItems->sum('total_price'), 2) }} $</span>
                            </li>
                        </ul>
                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-lg d-block w-100"><i class="fas fa-money-check-alt me-2"></i> إتمام الشراء</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
```

**`resources/views/orders/index.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4"><i class="fas fa-box me-2"></i> طلباتي</h2>

    @if ($orders->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            لم تقم بأي طلبات بعد.
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col"># الطلب</th>
                                <th scope="col">التاريخ</th>
                                <th scope="col">الإجمالي</th>
                                <th scope="col">الحالة</th>
                                <th scope="col">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ $order->order_date->format('Y-m-d H:i') }}</td>
                                    <td>{{ number_format($order->total_price, 2) }} $</td>
                                    <td>
                                        <span class="badge {{
                                            $order->status == 'جديد' ? 'bg-warning text-dark' :
                                            ($order->status == 'تم الدفع' ? 'bg-success' :
                                            'bg-danger')
                                        }}">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="عرض التفاصيل"><i class="fas fa-eye"></i></a>
                                        @if ($order->status == 'جديد')
                                            <form action="{{ route('orders.pay', $order->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('هل أنت متأكد من رغبتك في الدفع الآن؟')" data-bs-toggle="tooltip" data-bs-placement="top" title="الدفع الآن"><i class="fas fa-credit-card"></i> الدفع</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
```

**`resources/views/orders/show.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg animate__animated animate__fadeIn">
        <div class="card-header bg-dark text-white text-center py-3">
            <h3 class="mb-0"><i class="fas fa-receipt me-2"></i> تفاصيل الطلب #{{ $order->id }}</h3>
        </div>
        <div class="card-body p-4">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>معلومات الطلب:</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            تاريخ الطلب:
                            <span>{{ $order->order_date->format('Y-m-d H:i') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الحالة:
                            <span class="badge {{
                                $order->status == 'جديد' ? 'bg-warning text-dark' :
                                ($order->status == 'تم الدفع' ? 'bg-success' :
                                'bg-danger')
                            }}">
                                {{ $order->status }}
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center fs-5 text-primary">
                            الإجمالي الكلي:
                            <span class="fw-bold">{{ number_format($order->total_price, 2) }} $</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5>معلومات العميل:</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الاسم:
                            <span>{{ $order->user->full_name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            البريد الإلكتروني:
                            <span>{{ $order->user->email }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <h5 class="mb-3">عناصر الطلب:</h5>
            @if ($order->items->isEmpty())
                <p class="text-center text-muted">لا توجد عناصر في هذا الطلب.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center">
                        <thead class="table-light">
                            <tr>
                                <th>المنتج</th>
                                <th>الكمية</th>
                                <th>السعر الفردي</th>
                                <th>الإجمالي</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td class="d-flex align-items-center">
                                        <img src="{{ $item->product->album_photos && count($item->product->album_photos) > 0 ? asset('storage/' . $item->product->album_photos[0]) : asset('images/placeholder.png') }}" class="img-fluid rounded me-2" style="width: 50px; height: 50px; object-fit: cover;" alt="{{ $item->product->product_name }}">
                                        <a href="{{ route('products.show', $item->product->id) }}" class="text-decoration-none">{{ $item->product->product_name }}</a>
                                    </td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->product->price, 2) }} $</td>
                                    <td>{{ number_format($item->total_price, 2) }} $</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-start">الإجمالي الكلي للطلب:</th>
                                <th class="text-end">{{ number_format($order->total_price, 2) }} $</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            @endif

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('orders.index') }}" class="btn btn-secondary me-2"><i class="fas fa-arrow-left me-2"></i> العودة للطلبات</a>
                @if ($order->status == 'جديد' && Auth::user()->isBuyer())
                    <form action="{{ route('orders.pay', $order->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success"><i class="fas fa-credit-card me-2"></i> إتمام الدفع</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
```

**`resources/views/orders/payment_confirmation.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg animate__animated animate__fadeIn">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h3 class="mb-0"><i class="fas fa-check-circle me-2"></i> تأكيد عملية الدفع</h3>
                </div>
                <div class="card-body p-4 text-center">
                    @if (session('success'))
                        <div class="alert alert-success d-flex align-items-center justify-content-center" role="alert">
                            <i class="fas fa-check-circle fa-2x me-3"></i>
                            <div>
                                <h4 class="alert-heading">عملية الدفع تمت بنجاح!</h4>
                                <p class="mb-0">شكراً لك على طلبك. لقد تم استلام دفعتك بنجاح وسيتم تجهيز طلبك قريباً.</p>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-danger d-flex align-items-center justify-content-center" role="alert">
                            <i class="fas fa-times-circle fa-2x me-3"></i>
                            <div>
                                <h4 class="alert-heading">فشل عملية الدفع!</h4>
                                <p class="mb-0">حدث خطأ أثناء معالجة دفعتك. يرجى المحاولة مرة أخرى أو الاتصال بالدعم الفني.</p>
                            </div>
                        </div>
                    @endif

                    <div class="mt-4">
                        <p class="lead">يمكنك مراجعة حالة طلباتك من صفحة الطلبات.</p>
                        <a href="{{ route('orders.index') }}" class="btn btn-primary btn-lg me-2"><i class="fas fa-box me-2"></i> عرض طلباتي</a>
                        <a href="{{ route('products.index') }}" class="btn btn-info btn-lg"><i class="fas fa-gem me-2"></i> مواصلة التسوق</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```
**ملاحظة:** هذه الصفحة تستخدم `session('success')` أو `session('error')` التي قد تأتي من `OrderController::processPayment`، لذا لن يكون لديها بيانات `$order` مباشرة.

**`resources/views/wishlist/index.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4"><i class="fas fa-heart me-2"></i> قائمة المفضلة</h2>

    @if ($wishlistItems->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            قائمة المفضلة الخاصة بك فارغة. <a href="{{ route('products.index') }}" class="alert-link">تصفح المنتجات وأضف ما يعجبك!</a>
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($wishlistItems as $item)
                <div class="col">
                    <div class="card h-100 product-card shadow-sm animate__animated animate__fadeInUp">
                        @if ($item->product->album_photos && count($item->product->album_photos) > 0)
                            <img src="{{ asset('storage/' . $item->product->album_photos[0]) }}" class="card-img-top product-card-img" alt="{{ $item->product->product_name }}">
                        @else
                            <img src="{{ asset('images/placeholder.png') }}" class="card-img-top product-card-img" alt="صورة غير متوفرة">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary">{{ $item->product->product_name }}</h5>
                            <p class="card-text text-muted">{{ $item->product->type->type_name ?? 'غير محدد' }}</p>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-bold fs-5 text-gold">{{ number_format($item->product->price, 2) }} $</span>
                                @if ($item->product->rating)
                                    <div class="stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $item->product->rating)
                                                <i class="fas fa-star"></i>
                                            @elseif ($i - 0.5 <= $item->product->rating)
                                                <i class="fas fa-star-half-alt"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                        <small class="text-muted">({{ $item->product->rating }})</small>
                                    </div>
                                @else
                                    <small class="text-muted">لا توجد تقييمات</small>
                                @endif
                            </div>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <a href="{{ route('products.show', $item->product->id) }}" class="btn btn-outline-info btn-sm">عرض التفاصيل <i class="fas fa-eye ms-1"></i></a>
                                <form action="{{ route('cart.store') }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-success btn-sm">إضافة للسلة <i class="fas fa-cart-plus ms-1"></i></button>
                                </form>
                                <form action="{{ route('wishlist.destroy', $item->id) }}" method="POST" class="d-inline ms-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد أنك تريد إزالة هذا المنتج من المفضلة؟')" data-bs-toggle="tooltip" data-bs-placement="top" title="إزالة من المفضلة">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
```

**4. Views خاصة بالبائع (دور: بائع)**

**`resources/views/seller/dashboard.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4"><i class="fas fa-store me-2"></i> لوحة تحكم البائع</h2>

    <div class="row animate__animated animate__fadeInUp">
        <div class="col-md-4 mb-4">
            <div class="card text-center h-100 shadow-sm">
                <div class="card-body">
                    <i class="fas fa-gem fa-3x text-info mb-3"></i>
                    <h5 class="card-title">منتجاتي</h5>
                    <p class="card-text">إدارة وعرض المنتجات التي قمت بإضافتها.</p>
                    <a href="{{ route('seller.products.index') }}" class="btn btn-info btn-sm mt-2">عرض المنتجات <i class="fas fa-arrow-alt-circle-right ms-1"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center h-100 shadow-sm">
                <div class="card-body">
                    <i class="fas fa-plus-circle fa-3x text-success mb-3"></i>
                    <h5 class="card-title">إضافة منتج جديد</h5>
                    <p class="card-text">أضف جواهرك الفريدة لبيعها في المتجر.</p>
                    <a href="{{ route('seller.products.create') }}" class="btn btn-success btn-sm mt-2">إضافة منتج <i class="fas fa-plus ms-1"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center h-100 shadow-sm">
                <div class="card-body">
                    <i class="fas fa-chart-line fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">الإحصائيات</h5>
                    <p class="card-text">تتبع أداء مبيعاتك ومنتجاتك.</p>
                    {{-- يمكن إضافة روابط لإحصائيات مفصلة لاحقًا --}}
                    <a href="#" class="btn btn-primary btn-sm mt-2 disabled">قريباً <i class="fas fa-chart-bar ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```

**`resources/views/seller/products/index.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="fas fa-boxes me-2"></i> منتجاتي</h2>
        <a href="{{ route('seller.products.create') }}" class="btn btn-success"><i class="fas fa-plus-circle me-2"></i> إضافة منتج جديد</a>
    </div>

    @if ($products->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            لم تقم بإضافة أي منتجات بعد. <a href="{{ route('seller.products.create') }}" class="alert-link">ابدأ الآن!</a>
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">صورة</th>
                                <th scope="col">اسم المنتج</th>
                                <th scope="col">النوع</th>
                                <th scope="col">السعر</th>
                                <th scope="col">الحالة</th>
                                <th scope="col">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($product->album_photos && count($product->album_photos) > 0)
                                            <img src="{{ asset('storage/' . $product->album_photos[0]) }}" alt="{{ $product->product_name }}" class="img-fluid rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('images/placeholder.png') }}" alt="صورة غير متوفرة" class="img-fluid rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                        @endif
                                    </td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->type->type_name ?? 'غير محدد' }}</td>
                                    <td class="text-gold fw-bold">{{ number_format($product->price, 2) }} $</td>
                                    <td>
                                        <span class="badge {{
                                            $product->status == 'قيد التحقق' ? 'bg-warning text-dark' :
                                            ($product->status == 'تم الإضافة' ? 'bg-success' :
                                            ($product->status == 'تم البيع' ? 'bg-info' : 'bg-danger'))
                                        }}">
                                            {{ $product->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('seller.products.show', $product->id) }}" class="btn btn-info btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="عرض"><i class="fas fa-eye"></i></a>
                                        @if ($product->status != 'تم البيع') {{-- لا يمكن تعديل أو حذف منتج تم بيعه --}}
                                            <a href="{{ route('seller.products.edit', $product->id) }}" class="btn btn-primary btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="تعديل"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المنتج؟ لا يمكن التراجع عن هذا الإجراء.')" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
```

**`resources/views/seller/products/create.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg animate__animated animate__fadeIn">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h3 class="mb-0"><i class="fas fa-plus-circle me-2"></i> إضافة منتج جديد</h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="product_name" class="form-label">اسم المنتج <span class="text-danger">*</span></label>
                            <input type="text" name="product_name" id="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name') }}" required>
                            @error('product_name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="price" class="form-label">السعر ($) <span class="text-danger">*</span></label>
                                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" step="0.01" min="0.01" value="{{ old('price') }}" required>
                                @error('price')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="type_id" class="form-label">نوع المنتج <span class="text-danger">*</span></label>
                                <select name="type_id" id="type_id" class="form-select @error('type_id') is-invalid @enderror" required>
                                    <option value="">اختر النوع</option>
                                    @foreach ($productTypes as $type)
                                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                            {{ $type->type_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="album_photos" class="form-label">صور المنتج (يمكنك رفع عدة صور)</label>
                            <input type="file" name="album_photos[]" id="album_photos" class="form-control @error('album_photos.*') is-invalid @enderror" multiple accept="image/*">
                            @error('album_photos.*')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            @error('album_photos')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <small class="form-text text-muted">الصيغ المدعومة: JPG, PNG, GIF, WEBP. الحد الأقصى للحجم: 5 ميجابايت للصورة الواحدة.</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="shape" class="form-label">الشكل (مثال: خاتم، سوار، قلادة)</label>
                                <input type="text" name="shape" id="shape" class="form-control @error('shape') is-invalid @enderror" value="{{ old('shape') }}">
                                @error('shape')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="weight" class="form-label">الوزن (جرام)</label>
                                <input type="number" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror" step="0.01" min="0" value="{{ old('weight') }}">
                                @error('weight')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-plus me-2"></i> إضافة المنتج</button>
                            <a href="{{ route('seller.products.index') }}" class="btn btn-secondary btn-lg"><i class="fas fa-arrow-left me-2"></i> إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```

**`resources/views/seller/products/show.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg animate__animated animate__fadeIn">
        <div class="card-header bg-dark text-white text-center py-3">
            <h3 class="mb-0"><i class="fas fa-gem me-2"></i> {{ $product->product_name }} (تفاصيل المنتج)</h3>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @if ($product->album_photos && count($product->album_photos) > 0)
                                @foreach ($product->album_photos as $key => $photo)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $photo) }}" class="d-block w-100 rounded" alt="{{ $product->product_name }}" style="height: 400px; object-fit: contain;">
                                    </div>
                                @endforeach
                            @else
                                <div class="carousel-item active">
                                    <img src="{{ asset('images/placeholder.png') }}" class="d-block w-100 rounded" alt="صورة غير متوفرة" style="height: 400px; object-fit: contain;">
                                </div>
                            @endif
                        </div>
                        @if ($product->album_photos && count($product->album_photos) > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">السابق</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">التالي</span>
                            </button>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <h1 class="display-6 text-primary mb-3">{{ $product->product_name }}</h1>
                    <p class="lead text-gold mb-4">{{ number_format($product->price, 2) }} $</p>

                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            النوع:
                            <span>{{ $product->type->type_name ?? 'غير محدد' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الشكل:
                            <span>{{ $product->shape ?? 'غير محدد' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الوزن:
                            <span>{{ $product->weight ? $product->weight . ' جرام' : 'غير محدد' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الحالة:
                            <span class="badge {{
                                $product->status == 'قيد التحقق' ? 'bg-warning text-dark' :
                                ($product->status == 'تم الإضافة' ? 'bg-success' :
                                ($product->status == 'تم البيع' ? 'bg-info' : 'bg-danger'))
                            }}">
                                {{ $product->status }}
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            التقييم:
                            @if ($product->rating)
                                <div class="stars">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $product->rating)
                                            <i class="fas fa-star"></i>
                                        @elseif ($i - 0.5 <= $product->rating)
                                            <i class="fas fa-star-half-alt"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                    <span class="text-muted">({{ $product->rating }})</span>
                                </div>
                            @else
                                <span class="text-muted">لا توجد تقييمات</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            تاريخ الإضافة:
                            <span>{{ $product->created_at->format('Y-m-d H:i') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            آخر تحديث:
                            <span>{{ $product->updated_at->format('Y-m-d H:i') }}</span>
                        </li>
                    </ul>

                    <div class="d-grid gap-2 mt-4">
                        @if ($product->status != 'تم البيع')
                            <a href="{{ route('seller.products.edit', $product->id) }}" class="btn btn-primary btn-lg"><i class="fas fa-edit me-2"></i> تعديل المنتج</a>
                            <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-lg w-100" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المنتج؟ لا يمكن التراجع عن هذا الإجراء.')"><i class="fas fa-trash-alt me-2"></i> حذف المنتج</button>
                            </form>
                        @else
                            <div class="alert alert-info text-center" role="alert">
                                هذا المنتج تم بيعه ولا يمكن تعديله أو حذفه.
                            </div>
                        @endif
                        <a href="{{ route('seller.products.index') }}" class="btn btn-secondary btn-lg"><i class="fas fa-arrow-left me-2"></i> العودة لقائمة المنتجات</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```

**`resources/views/seller/products/edit.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg animate__animated animate__fadeIn">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h3 class="mb-0"><i class="fas fa-edit me-2"></i> تعديل المنتج: {{ $product->product_name }}</h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('seller.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="product_name" class="form-label">اسم المنتج <span class="text-danger">*</span></label>
                            <input type="text" name="product_name" id="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name', $product->product_name) }}" required>
                            @error('product_name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="price" class="form-label">السعر ($) <span class="text-danger">*</span></label>
                                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" step="0.01" min="0.01" value="{{ old('price', $product->price) }}" required>
                                @error('price')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="type_id" class="form-label">نوع المنتج <span class="text-danger">*</span></label>
                                <select name="type_id" id="type_id" class="form-select @error('type_id') is-invalid @enderror" required>
                                    <option value="">اختر النوع</option>
                                    @foreach ($productTypes as $type)
                                        <option value="{{ $type->id }}" {{ (old('type_id', $product->type_id) == $type->id) ? 'selected' : '' }}>
                                            {{ $type->type_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="album_photos" class="form-label">صور المنتج (يمكنك رفع صور جديدة لتغيير الصور الحالية)</label>
                            <input type="file" name="album_photos[]" id="album_photos" class="form-control @error('album_photos.*') is-invalid @enderror" multiple accept="image/*">
                            @error('album_photos.*')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            @error('album_photos')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <small class="form-text text-muted">الصيغ المدعومة: JPG, PNG, GIF, WEBP. الحد الأقصى للحجم: 5 ميجابايت للصورة الواحدة.</small>
                            @if ($product->album_photos && count($product->album_photos) > 0)
                                <div class="mt-3">
                                    <h6>الصور الحالية:</h6>
                                    <div class="d-flex flex-wrap">
                                        @foreach ($product->album_photos as $photo)
                                            <img src="{{ asset('storage/' . $photo) }}" class="img-thumbnail me-2 mb-2" style="width: 100px; height: 100px; object-fit: cover;" alt="صورة منتج">
                                        @endforeach
                                    </div>
                                    <small class="text-muted">ستحل الصور الجديدة محل الصور الحالية.</small>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="shape" class="form-label">الشكل (مثال: خاتم، سوار، قلادة)</label>
                                <input type="text" name="shape" id="shape" class="form-control @error('shape') is-invalid @enderror" value="{{ old('shape', $product->shape) }}">
                                @error('shape')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="weight" class="form-label">الوزن (جرام)</label>
                                <input type="number" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror" step="0.01" min="0" value="{{ old('weight', $product->weight) }}">
                                @error('weight')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save me-2"></i> حفظ التغييرات</button>
                            <a href="{{ route('seller.products.index') }}" class="btn btn-secondary btn-lg"><i class="fas fa-arrow-left me-2"></i> إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```

**5. Views خاصة بالمدير (دور: مدير)**

**`resources/views/admin/dashboard.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4"><i class="fas fa-cogs me-2"></i> لوحة تحكم المدير</h2>

    <div class="row animate__animated animate__fadeInUp">
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card text-center h-100 shadow-sm bg-primary text-white">
                <div class="card-body">
                    <i class="fas fa-users fa-3x mb-3"></i>
                    <h5 class="card-title">إجمالي المستخدمين</h5>
                    <p class="card-text fs-2 fw-bold">{{ $totalUsers }}</p>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-light btn-sm mt-2 text-primary">إدارة المستخدمين <i class="fas fa-arrow-alt-circle-right ms-1"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card text-center h-100 shadow-sm bg-info text-white">
                <div class="card-body">
                    <i class="fas fa-gem fa-3x mb-3"></i>
                    <h5 class="card-title">إجمالي المنتجات</h5>
                    <p class="card-text fs-2 fw-bold">{{ $totalProducts }}</p>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-light btn-sm mt-2 text-info">إدارة المنتجات <i class="fas fa-arrow-alt-circle-right ms-1"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card text-center h-100 shadow-sm bg-warning text-dark">
                <div class="card-body">
                    <i class="fas fa-hourglass-half fa-3x mb-3"></i>
                    <h5 class="card-title">منتجات قيد التحقق</h5>
                    <p class="card-text fs-2 fw-bold">{{ $pendingProducts }}</p>
                    <a href="{{ route('admin.products.index', ['status' => 'قيد التحقق']) }}" class="btn btn-light btn-sm mt-2 text-warning">مراجعة المنتجات <i class="fas fa-arrow-alt-circle-right ms-1"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card text-center h-100 shadow-sm bg-success text-white">
                <div class="card-body">
                    <i class="fas fa-receipt fa-3x mb-3"></i>
                    <h5 class="card-title">إجمالي الطلبات</h5>
                    <p class="card-text fs-2 fw-bold">{{ $totalOrders }}</p>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-light btn-sm mt-2 text-success">إدارة الطلبات <i class="fas fa-arrow-alt-circle-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row animate__animated animate__fadeInUp mt-4">
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card text-center h-100 shadow-sm">
                <div class="card-body">
                    <i class="fas fa-tags fa-3x text-secondary mb-3"></i>
                    <h5 class="card-title">إدارة الأصناف</h5>
                    <p class="card-text">إضافة، تعديل، حذف أنواع المنتجات (الأصناف).</p>
                    <a href="{{ route('admin.product-types.index') }}" class="btn btn-secondary btn-sm mt-2">إدارة الأصناف <i class="fas fa-arrow-alt-circle-right ms-1"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card text-center h-100 shadow-sm">
                <div class="card-body">
                    <i class="fas fa-file-invoice-dollar fa-3x text-dark mb-3"></i>
                    <h5 class="card-title">التقارير المالية</h5>
                    <p class="card-text">عرض تقارير المبيعات والإيرادات.</p>
                    <a href="#" class="btn btn-dark btn-sm mt-2 disabled">قريباً <i class="fas fa-chart-pie ms-1"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card text-center h-100 shadow-sm">
                <div class="card-body">
                    <i class="fas fa-envelope fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">دعم العملاء</h5>
                    <p class="card-text">مراجعة رسائل الدعم والرد على استفسارات العملاء.</p>
                    <a href="#" class="btn btn-primary btn-sm mt-2 disabled">قريباً <i class="fas fa-inbox ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```

**`resources/views/admin/products/index.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4"><i class="fas fa-boxes me-2"></i> إدارة المنتجات (المدير)</h2>

    {{-- قسم الفلاتر --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('admin.products.index') }}" method="GET" class="row g-3 align-items-center">
                <div class="col-md-4">
                    <label for="status" class="form-label visually-hidden">الحالة</label>
                    <select name="status" id="status" class="form-select">
                        <option value="">جميع الحالات</option>
                        <option value="قيد التحقق" {{ request('status') == 'قيد التحقق' ? 'selected' : '' }}>قيد التحقق</option>
                        <option value="تم الإضافة" {{ request('status') == 'تم الإضافة' ? 'selected' : '' }}>تم الإضافة</option>
                        <option value="تم الرفض" {{ request('status') == 'تم الرفض' ? 'selected' : '' }}>تم الرفض</option>
                        <option value="تم البيع" {{ request('status') == 'تم البيع' ? 'selected' : '' }}>تم البيع</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="type_id" class="form-label visually-hidden">الصنف</label>
                    <select name="type_id" id="type_id" class="form-select">
                        <option value="">جميع الأصناف</option>
                        @foreach ($productTypes as $type)
                            <option value="{{ $type->id }}" {{ request('type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->type_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-filter me-2"></i> فلترة</button>
                </div>
            </form>
        </div>
    </div>

    @if ($products->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            لا توجد منتجات مطابقة لمعايير الفلترة.
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">صورة</th>
                                <th scope="col">اسم المنتج</th>
                                <th scope="col">السعر</th>
                                <th scope="col">البائع</th>
                                <th scope="col">الحالة</th>
                                <th scope="col">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($product->album_photos && count($product->album_photos) > 0)
                                            <img src="{{ asset('storage/' . $product->album_photos[0]) }}" alt="{{ $product->product_name }}" class="img-fluid rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('images/placeholder.png') }}" alt="صورة غير متوفرة" class="img-fluid rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                        @endif
                                    </td>
                                    <td>{{ $product->product_name }}</td>
                                    <td class="text-gold fw-bold">{{ number_format($product->price, 2) }} $</td>
                                    <td>{{ $product->owner->full_name ?? 'غير معروف' }}</td>
                                    <td>
                                        <span class="badge {{
                                            $product->status == 'قيد التحقق' ? 'bg-warning text-dark' :
                                            ($product->status == 'تم الإضافة' ? 'bg-success' :
                                            ($product->status == 'تم البيع' ? 'bg-info' : 'bg-danger'))
                                        }}">
                                            {{ $product->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="عرض"><i class="fas fa-eye"></i></a>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المنتج؟ سيتم حذف جميع البيانات المتعلقة به.')" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
```

**`resources/views/admin/products/show.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg animate__animated animate__fadeIn">
        <div class="card-header bg-dark text-white text-center py-3">
            <h3 class="mb-0"><i class="fas fa-gem me-2"></i> {{ $product->product_name }} (إدارة المدير)</h3>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @if ($product->album_photos && count($product->album_photos) > 0)
                                @foreach ($product->album_photos as $key => $photo)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $photo) }}" class="d-block w-100 rounded" alt="{{ $product->product_name }}" style="height: 400px; object-fit: contain;">
                                    </div>
                                @endforeach
                            @else
                                <div class="carousel-item active">
                                    <img src="{{ asset('images/placeholder.png') }}" class="d-block w-100 rounded" alt="صورة غير متوفرة" style="height: 400px; object-fit: contain;">
                                </div>
                            @endif
                        </div>
                        @if ($product->album_photos && count($product->album_photos) > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">السابق</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">التالي</span>
                            </button>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <h1 class="display-6 text-primary mb-3">{{ $product->product_name }}</h1>
                    <p class="lead text-gold mb-4">{{ number_format($product->price, 2) }} $</p>

                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            النوع:
                            <span>{{ $product->type->type_name ?? 'غير محدد' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الشكل:
                            <span>{{ $product->shape ?? 'غير محدد' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الوزن:
                            <span>{{ $product->weight ? $product->weight . ' جرام' : 'غير محدد' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            البائع:
                            <span>{{ $product->owner->full_name ?? 'غير معروف' }} (<a href="{{ route('admin.users.show', $product->owner->id) }}">{{ $product->owner->email ?? '' }}</a>)</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الحالة الحالية:
                            <span class="badge {{
                                $product->status == 'قيد التحقق' ? 'bg-warning text-dark' :
                                ($product->status == 'تم الإضافة' ? 'bg-success' :
                                ($product->status == 'تم البيع' ? 'bg-info' : 'bg-danger'))
                            }}">
                                {{ $product->status }}
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            التقييم:
                            @if ($product->rating)
                                <div class="stars">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $product->rating)
                                            <i class="fas fa-star"></i>
                                        @elseif ($i - 0.5 <= $product->rating)
                                            <i class="fas fa-star-half-alt"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                    <span class="text-muted">({{ $product->rating }})</span>
                                </div>
                            @else
                                <span class="text-muted">لا توجد تقييمات</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            تاريخ الإضافة:
                            <span>{{ $product->created_at->format('Y-m-d H:i') }}</span>
                        </li>
                    </ul>

                    <h5 class="mt-4 mb-3">تغيير حالة المنتج:</h5>
                    <form action="{{ route('admin.products.update_status', $product->id) }}" method="POST" class="mb-3">
                        @csrf
                        @method('PUT')
                        <div class="input-group mb-3">
                            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                                <option value="قيد التحقق" {{ $product->status == 'قيد التحقق' ? 'selected' : '' }}>قيد التحقق</option>
                                <option value="تم الإضافة" {{ $product->status == 'تم الإضافة' ? 'selected' : '' }}>تم الإضافة</option>
                                <option value="تم الرفض" {{ $product->status == 'تم الرفض' ? 'selected' : '' }}>تم الرفض</option>
                                <option value="تم البيع" {{ $product->status == 'تم البيع' ? 'selected' : '' }}>تم البيع</option>
                            </select>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> تحديث الحالة</button>
                            @error('status')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </form>

                    <div class="d-grid gap-2 mt-4">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary btn-lg"><i class="fas fa-arrow-left me-2"></i> العودة لقائمة المنتجات</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-lg w-100" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المنتج؟ سيتم حذف جميع البيانات المتعلقة به.')"><i class="fas fa-trash-alt me-2"></i> حذف المنتج نهائياً</button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- قسم التقييمات (للمراجعة من قبل المدير) --}}
            <div class="card shadow-lg mt-5 animate__animated animate__fadeInUp">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0"><i class="fas fa-comments me-2"></i> تقييمات المنتج ({{ $product->ratings->count() }})</h4>
                </div>
                <div class="card-body p-4">
                    @if ($product->ratings->isEmpty())
                        <p class="text-center text-muted">لا توجد تقييمات لهذا المنتج بعد.</p>
                    @else
                        @foreach ($product->ratings as $rating)
                            <div class="card mb-3 shadow-sm">
                                <div class="card-body">
                                    <h6 class="card-title mb-1">
                                        <i class="fas fa-user-circle me-1"></i> <a href="{{ route('admin.users.show', $rating->user->id) }}" class="text-decoration-none">{{ $rating->user->full_name ?? 'مستخدم غير معروف' }}</a>
                                        <small class="text-muted float-end">{{ $rating->created_at->diffForHumans() }}</small>
                                    </h6>
                                    <div class="stars mb-2">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $rating->rating_value)
                                                <i class="fas fa-star"></i>
                                            @elseif ($i - 0.5 <= $rating->rating_value)
                                                <i class="fas fa-star-half-alt"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                        <span class="fw-bold ms-1">{{ $rating->rating_value }}</span>
                                    </div>
                                    @if ($rating->comment)
                                        <p class="card-text">{{ $rating->comment }}</p>
                                    @endif
                                    {{-- يمكن إضافة زر لحذف التقييم من هنا للمدير --}}
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```

**`resources/views/admin/users/index.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4"><i class="fas fa-users-cog me-2"></i> إدارة المستخدمين</h2>

    @if ($users->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            لا يوجد مستخدمون لعرضهم.
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">الاسم</th>
                                <th scope="col">اسم المستخدم</th>
                                <th scope="col">البريد الإلكتروني</th>
                                <th scope="col">الدور</th>
                                <th scope="col">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $userItem) {{-- تجنب تضارب الاسم مع $user في layouts --}}
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $userItem->full_name }}</td>
                                    <td>{{ $userItem->username }}</td>
                                    <td>{{ $userItem->email }}</td>
                                    <td>
                                        <span class="badge {{
                                            $userItem->role == 'مدير' ? 'bg-danger' :
                                            ($userItem->role == 'بائع' ? 'bg-info' :
                                            'bg-secondary')
                                        }}">
                                            {{ $userItem->role }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.users.show', $userItem->id) }}" class="btn btn-info btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="عرض"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('admin.users.edit', $userItem->id) }}" class="btn btn-primary btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="تعديل"><i class="fas fa-edit"></i></a>
                                        @if (Auth::id() !== $userItem->id && !$userItem->isAdmin()) {{-- منع حذف المشرف لنفسه أو لمشرفين آخرين --}}
                                            <form action="{{ route('admin.users.destroy', $userItem->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المستخدم؟ سيتم حذف جميع بياناته وطلباته ومنتجاته.')" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
```

**`resources/views/admin/users/show.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg animate__animated animate__fadeIn">
        <div class="card-header bg-dark text-white text-center py-3">
            <h3 class="mb-0"><i class="fas fa-user-circle me-2"></i> تفاصيل المستخدم: {{ $user->full_name }}</h3>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h5>المعلومات الشخصية:</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الاسم الكامل:
                            <span>{{ $user->full_name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            اسم المستخدم:
                            <span>{{ $user->username }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            البريد الإلكتروني:
                            <span>{{ $user->email }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            النوع:
                            <span>{{ $user->gender }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            تاريخ الميلاد:
                            <span>{{ $user->birth_date ? $user->birth_date->format('Y-m-d') : 'غير محدد' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الدور:
                            <span class="badge {{
                                $user->role == 'مدير' ? 'bg-danger' :
                                ($user->role == 'بائع' ? 'bg-info' :
                                'bg-secondary')
                            }}">
                                {{ $user->role }}
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            تاريخ التسجيل:
                            <span>{{ $user->created_at->format('Y-m-d H:i') }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    @if ($user->isSeller() && $user->products->isNotEmpty())
                        <h5>المنتجات التي يملكها (البائع):</h5>
                        <ul class="list-group list-group-flush">
                            @foreach ($user->products as $product)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{ route('admin.products.show', $product->id) }}" class="text-decoration-none">{{ $product->product_name }}</a>
                                    <span class="badge {{
                                        $product->status == 'قيد التحقق' ? 'bg-warning text-dark' :
                                        ($product->status == 'تم الإضافة' ? 'bg-success' :
                                        ($product->status == 'تم البيع' ? 'bg-info' : 'bg-danger'))
                                    }}">
                                        {{ $product->status }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @elseif ($user->isBuyer() && $user->orders->isNotEmpty())
                        <h5>الطلبات التي قام بها (المشتري):</h5>
                        <ul class="list-group list-group-flush">
                            @foreach ($user->orders as $order)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="text-decoration-none">طلب #{{ $order->id }}</a>
                                    <span class="badge {{
                                        $order->status == 'جديد' ? 'bg-warning text-dark' :
                                        ($order->status == 'تم الدفع' ? 'bg-success' :
                                        'bg-danger')
                                    }}">
                                        {{ $order->status }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted text-center mt-3">لا توجد بيانات إضافية لهذا المستخدم حالياً.</p>
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary me-2"><i class="fas fa-edit me-2"></i> تعديل المستخدم</a>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary me-2"><i class="fas fa-arrow-left me-2"></i> العودة للمستخدمين</a>
                @if (Auth::id() !== $user->id && !$user->isAdmin())
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المستخدم؟ هذا الإجراء لا يمكن التراجع عنه.')"><i class="fas fa-trash-alt me-2"></i> حذف المستخدم</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
```

**`resources/views/admin/users/edit.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg animate__animated animate__fadeIn">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h3 class="mb-0"><i class="fas fa-user-edit me-2"></i> تعديل المستخدم: {{ $user->full_name }}</h3>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">{{ __('الاسم الأول') }}</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name', $user->first_name) }}" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">{{ __('الاسم الأخير') }}</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name', $user->last_name) }}" required autocomplete="last_name">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">{{ __('اسم المستخدم') }}</label>
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}" required autocomplete="username">
                            @error('username')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('البريد الإلكتروني') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">{{ __('النوع') }}</label>
                            <select id="gender" name="gender" class="form-select @error('gender') is-invalid @enderror" required>
                                <option value="">اختر النوع</option>
                                <option value="ذكر" {{ (old('gender', $user->gender) == 'ذكر') ? 'selected' : '' }}>ذكر</option>
                                <option value="أنثى" {{ (old('gender', $user->gender) == 'أنثى') ? 'selected' : '' }}>أنثى</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="birth_date" class="form-label">{{ __('تاريخ الميلاد') }} (اختياري)</label>
                            <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date', $user->birth_date ? $user->birth_date->format('Y-m-d') : '') }}">
                            @error('birth_date')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">{{ __('الدور') }}</label>
                            <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" required
                                {{ $user->id === Auth::id() ? 'disabled' : '' }}> {{-- لا يمكن للمدير تغيير دوره --}}
                                <option value="مستخدم عادي" {{ (old('role', $user->role) == 'مستخدم عادي') ? 'selected' : '' }}>مستخدم عادي</option>
                                <option value="بائع" {{ (old('role', $user->role) == 'بائع') ? 'selected' : '' }}>بائع</option>
                                <option value="مدير" {{ (old('role', $user->role) == 'مدير') ? 'selected' : '' }}>مدير</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            @if ($user->id === Auth::id())
                                <small class="form-text text-muted">لا يمكنك تغيير دورك الخاص.</small>
                            @endif
                        </div>

                        <hr class="my-4">
                        <h5 class="mb-3">{{ __('تغيير كلمة المرور') }} (اتركها فارغة إذا لم ترغب في التغيير)</h5>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('كلمة المرور الجديدة') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('تأكيد كلمة المرور الجديدة') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save me-2"></i> {{ __('حفظ التغييرات') }}
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-lg"><i class="fas fa-arrow-left me-2"></i> إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```

**`resources/views/admin/orders/index.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4"><i class="fas fa-receipt me-2"></i> إدارة الطلبات (المدير)</h2>

    {{-- قسم الفلاتر --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('admin.orders.index') }}" method="GET" class="row g-3 align-items-center">
                <div class="col-md-6">
                    <label for="status" class="form-label visually-hidden">الحالة</label>
                    <select name="status" id="status" class="form-select">
                        <option value="">جميع الحالات</option>
                        <option value="جديد" {{ request('status') == 'جديد' ? 'selected' : '' }}>جديد</option>
                        <option value="تم الدفع" {{ request('status') == 'تم الدفع' ? 'selected' : '' }}>تم الدفع</option>
                        <option value="ملغي" {{ request('status') == 'ملغي' ? 'selected' : '' }}>ملغي</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-filter me-2"></i> فلترة</button>
                </div>
            </form>
        </div>
    </div>

    @if ($orders->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            لا توجد طلبات لعرضها.
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col"># الطلب</th>
                                <th scope="col">العميل</th>
                                <th scope="col">التاريخ</th>
                                <th scope="col">الإجمالي</th>
                                <th scope="col">الحالة</th>
                                <th scope="col">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $orderItem)
                                <tr>
                                    <td>#{{ $orderItem->id }}</td>
                                    <td><a href="{{ route('admin.users.show', $orderItem->user->id) }}">{{ $orderItem->user->full_name }}</a></td>
                                    <td>{{ $orderItem->order_date->format('Y-m-d H:i') }}</td>
                                    <td>{{ number_format($orderItem->total_price, 2) }} $</td>
                                    <td>
                                        <span class="badge {{
                                            $orderItem->status == 'جديد' ? 'bg-warning text-dark' :
                                            ($orderItem->status == 'تم الدفع' ? 'bg-success' :
                                            'bg-danger')
                                        }}">
                                            {{ $orderItem->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.orders.show', $orderItem->id) }}" class="btn btn-info btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="عرض"><i class="fas fa-eye"></i></a>
                                        <form action="{{ route('admin.orders.destroy', $orderItem->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا الطلب؟ سيتم حذف جميع عناصره.')" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $orders->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
```

**`resources/views/admin/orders/show.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg animate__animated animate__fadeIn">
        <div class="card-header bg-dark text-white text-center py-3">
            <h3 class="mb-0"><i class="fas fa-receipt me-2"></i> تفاصيل الطلب #{{ $order->id }} (المدير)</h3>
        </div>
        <div class="card-body p-4">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>معلومات الطلب:</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            تاريخ الطلب:
                            <span>{{ $order->order_date->format('Y-m-d H:i') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الحالة الحالية:
                            <span class="badge {{
                                $order->status == 'جديد' ? 'bg-warning text-dark' :
                                ($order->status == 'تم الدفع' ? 'bg-success' :
                                'bg-danger')
                            }}">
                                {{ $order->status }}
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center fs-5 text-primary">
                            الإجمالي الكلي:
                            <span class="fw-bold">{{ number_format($order->total_price, 2) }} $</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5>معلومات العميل:</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الاسم:
                            <span><a href="{{ route('admin.users.show', $order->user->id) }}">{{ $order->user->full_name }}</a></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            البريد الإلكتروني:
                            <span>{{ $order->user->email }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <h5 class="mb-3">عناصر الطلب:</h5>
            @if ($order->items->isEmpty())
                <p class="text-center text-muted">لا توجد عناصر في هذا الطلب.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center">
                        <thead class="table-light">
                            <tr>
                                <th>المنتج</th>
                                <th>الكمية</th>
                                <th>السعر الفردي</th>
                                <th>الإجمالي</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td class="d-flex align-items-center">
                                        <img src="{{ $item->product->album_photos && count($item->product->album_photos) > 0 ? asset('storage/' . $item->product->album_photos[0]) : asset('images/placeholder.png') }}" class="img-fluid rounded me-2" style="width: 50px; height: 50px; object-fit: cover;" alt="{{ $item->product->product_name }}">
                                        <a href="{{ route('admin.products.show', $item->product->id) }}" class="text-decoration-none">{{ $item->product->product_name }}</a>
                                    </td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->product->price, 2) }} $</td>
                                    <td>{{ number_format($item->total_price, 2) }} $</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-start">الإجمالي الكلي للطلب:</th>
                                <th class="text-end">{{ number_format($order->total_price, 2) }} $</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            @endif

            <h5 class="mt-4 mb-3">تغيير حالة الطلب:</h5>
            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="mb-3">
                @csrf
                @method('PUT')
                <div class="input-group mb-3">
                    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="جديد" {{ $order->status == 'جديد' ? 'selected' : '' }}>جديد</option>
                        <option value="تم الدفع" {{ $order->status == 'تم الدفع' ? 'selected' : '' }}>تم الدفع</option>
                        <option value="ملغي" {{ $order->status == 'ملغي' ? 'selected' : '' }}>ملغي</option>
                    </select>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> تحديث الحالة</button>
                    @error('status')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </form>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary me-2"><i class="fas fa-arrow-left me-2"></i> العودة للطلبات</a>
                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا الطلب؟ هذا الإجراء لا يمكن التراجع عنه.')"><i class="fas fa-trash-alt me-2"></i> حذف الطلب</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
```

**`resources/views/admin/product_types/index.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="fas fa-tags me-2"></i> إدارة أنواع المنتجات</h2>
        <a href="{{ route('admin.product-types.create') }}" class="btn btn-success"><i class="fas fa-plus-circle me-2"></i> إضافة نوع جديد</a>
    </div>

    @if ($productTypes->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            لا توجد أنواع منتجات لعرضها. <a href="{{ route('admin.product-types.create') }}" class="alert-link">ابدأ بإضافة نوع الآن!</a>
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">اسم النوع</th>
                                <th scope="col">الوصف</th>
                                <th scope="col">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productTypes as $type)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $type->type_name }}</td>
                                    <td>{{ Str::limit($type->description, 70) ?? 'لا يوجد وصف' }}</td>
                                    <td>
                                        <a href="{{ route('admin.product-types.show', $type->id) }}" class="btn btn-info btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="عرض"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('admin.product-types.edit', $type->id) }}" class="btn btn-primary btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="تعديل"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.product-types.destroy', $type->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا النوع؟ سيتم تعيين المنتجات المرتبطة به إلى "بلا نوع".')" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $productTypes->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
```

**`resources/views/admin/product_types/create.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg animate__animated animate__fadeIn">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h3 class="mb-0"><i class="fas fa-plus-circle me-2"></i> إضافة نوع منتج جديد</h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.product-types.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="type_name" class="form-label">اسم النوع <span class="text-danger">*</span></label>
                            <input type="text" name="type_name" id="type_name" class="form-control @error('type_name') is-invalid @enderror" value="{{ old('type_name') }}" required autofocus>
                            @error('type_name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">الوصف (اختياري)</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-plus me-2"></i> إضافة النوع</button>
                            <a href="{{ route('admin.product-types.index') }}" class="btn btn-secondary btn-lg"><i class="fas fa-arrow-left me-2"></i> إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```

**`resources/views/admin/product_types/show.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg animate__animated animate__fadeIn">
        <div class="card-header bg-dark text-white text-center py-3">
            <h3 class="mb-0"><i class="fas fa-tag me-2"></i> تفاصيل نوع المنتج: {{ $productType->type_name }}</h3>
        </div>
        <div class="card-body p-4">
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    اسم النوع:
                    <span>{{ $productType->type_name }}</span>
                </li>
                <li class="list-group-item">
                    الوصف:
                    <p class="text-muted mt-2">{{ $productType->description ?? 'لا يوجد وصف.' }}</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    تاريخ الإضافة:
                    <span>{{ $productType->created_at->format('Y-m-d H:i') }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    آخر تحديث:
                    <span>{{ $productType->updated_at->format('Y-m-d H:i') }}</span>
                </li>
            </ul>

            <h5 class="mt-4 mb-3">المنتجات التابعة لهذا النوع (أمثلة):</h5>
            @if ($productType->products->isEmpty())
                <p class="text-center text-muted">لا توجد منتجات مرتبطة بهذا النوع حالياً.</p>
            @else
                <div class="row row-cols-1 row-cols-md-2 g-3">
                    @foreach ($productType->products->take(4) as $product) {{-- عرض 4 منتجات كحد أقصى --}}
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body d-flex align-items-center">
                                    @if ($product->album_photos && count($product->album_photos) > 0)
                                        <img src="{{ asset('storage/' . $product->album_photos[0]) }}" class="img-fluid rounded me-3" style="width: 70px; height: 70px; object-fit: cover;" alt="{{ $product->product_name }}">
                                    @else
                                        <img src="{{ asset('images/placeholder.png') }}" class="img-fluid rounded me-3" style="width: 70px; height: 70px; object-fit: cover;" alt="صورة غير متوفرة">
                                    @endif
                                    <div>
                                        <h6 class="mb-0"><a href="{{ route('admin.products.show', $product->id) }}" class="text-decoration-none">{{ $product->product_name }}</a></h6>
                                        <small class="text-muted">{{ number_format($product->price, 2) }} $</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if ($productType->products->count() > 4)
                    <p class="text-center mt-3 text-muted">والمزيد من المنتجات...</p>
                @endif
            @endif

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('admin.product-types.edit', $productType->id) }}" class="btn btn-primary me-2"><i class="fas fa-edit me-2"></i> تعديل النوع</a>
                <a href="{{ route('admin.product-types.index') }}" class="btn btn-secondary me-2"><i class="fas fa-arrow-left me-2"></i> العودة لأنواع المنتجات</a>
                <form action="{{ route('admin.product-types.destroy', $productType->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا النوع؟')" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="fas fa-trash-alt me-2"></i> حذف النوع</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
```

**`resources/views/admin/product_types/edit.blade.php`**

```blade
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg animate__animated animate__fadeIn">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h3 class="mb-0"><i class="fas fa-edit me-2"></i> تعديل نوع المنتج: {{ $productType->type_name }}</h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.product-types.update', $productType->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="type_name" class="form-label">اسم النوع <span class="text-danger">*</span></label>
                            <input type="text" name="type_name" id="type_name" class="form-control @error('type_name') is-invalid @enderror" value="{{ old('type_name', $productType->type_name) }}" required autofocus>
                            @error('type_name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">الوصف (اختياري)</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description', $productType->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save me-2"></i> حفظ التغييرات</button>
                            <a href="{{ route('admin.product-types.index') }}" class="btn btn-secondary btn-lg"><i class="fas fa-arrow-left me-2"></i> إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```

---

هذه هي جميع الصفحات التي طلبتها بمحتوى كامل ومصممة لتكون جذابة ومتوافقة مع Bootstrap 5. تذكر أن تضيف صورًا فعلية إلى مجلد `public/images/` مثل `jewelry_bg.jpg` و `placeholder.png` وأي صور عينة أخرى استخدمتها، بالإضافة إلى صور المنتجات في `storage/app/public/products` بعد الرفع.

الآن، يمكنك البدء في اختبار تطبيقك وتعبئة قواعد البيانات بالبيانات لاختبار هذه الواجهات. بالتوفيق في مشروعك!



---
بالتأكيد! سأقوم بإعادة بناء ملف `UsersTableSeeder` ليتمكن من إنشاء مستخدمين متنوعين (مدير، بائع، مشتري) بشكل أكثر فعالية، مع الالتزام بالـ Model الخاص بك وتضمين جميع الحقول اللازمة.

هذه النسخة ستكون متوافقة مع Laravel 10/11/12 وتستخدم `User::create()` التي تتفاعل بشكل أفضل مع الـ Model، وتأخذ في الاعتبار الحقول الجديدة مثل `first_name`, `last_name`, `username`, `gender`, `birth_date`, و `role`.

**ملاحظة:** تأكد أنك قمت بتعديل الـ `User` Model الخاص بك كما اقترحت سابقاً ليشمل دوال `isAdmin()`, `isSeller()`, `isBuyer()`, والعلاقات.

---

**`database/seeders/UsersTableSeeder.php`**

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // استيراد نموذج المستخدم
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon; // لاستخدام Carbon لتحديد التواريخ

class UsersTableSeeder extends Seeder
{
    /**
     * تشغيل بذرة قاعدة البيانات.
     */
    public function run(): void
    {
        $faker = Faker::create('ar_SA'); // استخدام اللغة العربية للفيكر

        // 1. إنشاء مستخدم مدير (Admin) للتحقق بسهولة
        User::create([
            'first_name' => 'مدير',
            'last_name' => 'النظام',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // كلمة المرور الافتراضية 'password'
            'gender' => 'ذكر',
            'birth_date' => Carbon::parse('1990-01-01'), // تاريخ ميلاد محدد
            'role' => 'مدير',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. إنشاء مستخدم بائع (Seller) للتحقق بسهولة
        User::create([
            'first_name' => 'بائع',
            'last_name' => 'المتجر',
            'username' => 'seller',
            'email' => 'seller@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'gender' => 'أنثى',
            'birth_date' => Carbon::parse('1995-05-10'),
            'role' => 'بائع',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3. إنشاء مستخدم مشتري (Buyer - مستخدم عادي) للتحقق بسهولة
        User::create([
            'first_name' => 'مشتري',
            'last_name' => 'نشيط',
            'username' => 'buyer',
            'email' => 'buyer@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'gender' => 'ذكر',
            'birth_date' => Carbon::parse('1992-11-20'),
            'role' => 'مستخدم عادي',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 4. إنشاء 47 مستخدمًا عشوائيًا (ليكون المجموع 50)
        // توزيع الأدوار بشكل عشوائي (مثلاً: 70% مشتري، 30% بائع)
        $rolesDistribution = array_merge(
            array_fill(0, 33, 'مستخدم عادي'), // 33 مشتري
            array_fill(0, 14, 'بائع')          // 14 بائع
        );

        foreach (range(1, 47) as $index) {
            $gender = $faker->randomElement(['ذكر', 'أنثى']);
            User::create([
                'first_name' => $faker->firstName($gender === 'ذكر' ? 'male' : 'female'),
                'last_name' => $faker->lastName(),
                'username' => $faker->unique()->userName(),
                'email' => $faker->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'gender' => $gender,
                'birth_date' => $faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'), // تاريخ ميلاد بين 18 و 60 سنة مضت
                'role' => $faker->randomElement($rolesDistribution),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
```

---

**كيفية استخدام هذا الـ Seeder:**


2.  **تشغيل الـ Migrations والـ Seeders:**
    *   لإعادة بناء قاعدة البيانات من الصفر (حذف الجداول ثم إنشائها وتعبئتها بالبيانات الوهمية):
        ```bash
        php artisan migrate:fresh --seed
        ```


الآن سيكون لديك 3 مستخدمين محددين مسبقاً (مدير، بائع، مشتري) و47 مستخدماً عشوائياً آخرين، موزعين بين بائع ومشتري، مع بيانات كاملة ومتنوعة.


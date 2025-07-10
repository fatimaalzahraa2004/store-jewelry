/*global jQuery */
(function ($) {
    "use strict";

    jQuery(document).ready(function ($) {

        // Slider Carousel JS (#banner-carousel)
        var banner_owl = $('#banner-carousel');
        if (banner_owl.length > 0) { // تأكد من وجود العنصر
            banner_owl.owlCarousel({
                items: 1,
                loop: true,
                nav: true, // تفعيل الأسهم
                dots: false, // تعطيل النقاط
                smartSpeed: 1000,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                rtl: true, // مهم جداً لدعم RTL
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'] // أيقونات التنقل
            });
        }

        // Product Carousel JS (.products-carousel) - لأحدث المنتجات
        var products_carousel_dynamic = $('.products-carousel');
        if (products_carousel_dynamic.length > 0) { // تأكد من وجود العنصر
            products_carousel_dynamic.owlCarousel({
                items: 4, // عدد العناصر المرئية
                loop: true, // تفعيل التكرار
                dots: false, // تعطيل النقاط
                nav: true, // تفعيل الأسهم
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                margin: 30, // الهامش بين العناصر
                rtl: true, // مهم جداً لدعم RTL
                autoplay: true, // تفعيل التشغيل التلقائي
                autoplayTimeout: 5000, // وقت الانتظار
                autoplayHoverPause: true,
                responsive: {
                    0: { items: 1, margin: 0 },
                    576: { items: 2 },
                    768: { items: 3 },
                    992: { items: 4 },
                    1200: { items: 4 } // تأكد من عدد العناصر القصوى
                }
            });
        }

        // Testimonial Carousel JS (#testimonialCarousel)
        var testimonialCarousel = $('#testimonialCarousel');
        if (testimonialCarousel.length > 0) { // تأكد من وجود العنصر
            testimonialCarousel.owlCarousel({
                items: 1,
                loop: true,
                dots: true, // تفعيل النقاط
                nav: false, // تعطيل الأسهم
                autoplay: true,
                autoplayTimeout: 7000,
                autoplayHoverPause: true,
                rtl: true // مهم جداً لدعم RTL
            });
        }


        // ... (باقي كود active.js الأصلي الذي لا يخص الكاروسيل، مثل Bootstrap tooltip, Body Popup Modal, Slicknav, Scroll to top, Nice Select, Product View Style, Checkout Page Checkbox, Payment Method Accordion, Sale Products Countdown, Email Ajax Submission, All Window Scroll Function)
        // تأكد من الحفاظ على هذه الأجزاء الأخرى من active.js لأنها قد تكون مهمة لوظائف أخرى في القالب

    }); //Ready Function End

    jQuery(window).on('load', function () {
        // هذا الجزء يعمل بعد تحميل كل شيء (صور، CSS، JS)
        // يمكن وضع بعض تهيئات الكاروسيل هنا إذا استمرت المشكلة
    }); //window load End
}(jQuery));
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->decimal('price', 10, 2);
            $table->unsignedBigInteger('type_id')->nullable(); // مفتاح أجنبي إلى ProductTypes
            $table->text('album_photos')->nullable(); // يمكن تخزين روابط متعددة كـ JSON أو نص عادي
            $table->string('shape')->nullable(); // شكل المنتج (خاتم، اسوارة...)
            $table->unsignedBigInteger('owner_user_id'); // المستخدم المالك للمنتج
            $table->enum('status', ['قيد التحقق', 'تم الإضافة', 'تم الرفض', 'تم البيع'])->default('قيد التحقق');
            $table->decimal('rating', 2, 1)->nullable()->check('rating >= 1.0 and rating <= 5.0'); // تقييم عشري بين 1.0 و 5.0
            $table->float('weight')->nullable(); // وزن المنتج
            $table->timestamps();
        
            // علاقات
            $table->foreign('type_id')->references('id')->on('product_types')->onDelete('set null');
            $table->foreign('owner_user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

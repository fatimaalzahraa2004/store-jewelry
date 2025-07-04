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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // order_id
            $table->unsignedBigInteger('user_id'); // المستخدم صاحب الطلب
            $table->timestamp('order_date')->useCurrent(); // تاريخ إنشاء الطلب
            $table->decimal('total_price', 10, 2); // المبلغ الإجمالي للطلب
            $table->enum('status', ['جديد', 'تم الدفع', 'ملغي'])->default('جديد'); // حالة الطلب
            $table->timestamps();
        
            // العلاقة مع جدول المستخدمين
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

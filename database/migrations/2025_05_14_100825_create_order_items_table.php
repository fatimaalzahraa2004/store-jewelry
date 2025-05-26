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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id('order_item_id'); // Orders_Items_id
            $table->unsignedBigInteger('order_id'); // مفتاح الطلب
            $table->unsignedBigInteger('product_id'); // مفتاح المنتج
            $table->integer('quantity')->default(1);
            $table->decimal('total_price', 10, 2);
            $table->timestamp('added_time')->useCurrent();
            $table->timestamps();

            // العلاقات
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};

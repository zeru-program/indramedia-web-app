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
        Schema::create('orders_langsung', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->string('order_name');
            $table->string('order_phone');
            $table->text('order_message')->nullable();
            $table->string('product_sku');
            $table->string('product_name');
            $table->string('product_type');
            $table->string('product_category');
            $table->string('product_brand');
            $table->boolean('order_is_file')->default(false); $table->decimal('product_price_totals'); $table->string('status')->default("pending");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_langsung');
    }
};

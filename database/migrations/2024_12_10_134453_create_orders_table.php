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
            $table->boolean('order_is_file')->default(false);
            $table->boolean('product_is_promo')->default(false);
            $table->integer('product_amount');
            $table->decimal('product_price_unit');
            $table->decimal('product_price_discount')->nullable();         $table->decimal('product_percentage_discount')->nullable();
            $table->decimal('product_price_totals'); $table->string('product_payment_method')->default("cod"); 
            $table->string('product_delivery')->default("cod");
            $table->enum('status', ['pending', 'waiting payment', 'preparing', 'shipping', 'ready taken', 'success'])->default("pending");
            $table->timestamps();
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

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
        Schema::create('promo', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique();
            $table->string('product_name');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('initial_price');
            $table->decimal('promo_price');
            $table->decimal('percentage');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->foreign('sku')->references('sku')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo');
    }
};

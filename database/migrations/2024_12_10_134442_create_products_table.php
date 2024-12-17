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
            $table->string('sku')->unique();
            $table->string('image_path')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('type');
            $table->string('category');
            $table->string('brand');
            $table->decimal('price', 10, 2);
            $table->integer('stock')->default(0);
            $table->boolean('is_populer')->default(false);
            $table->boolean('is_featured')->default(false); $table->boolean('is_promo')->default(false);
            $table->enum('status', ['draft', 'active'])->default("active");
            $table->timestamps();
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

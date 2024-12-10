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
        Schema::create('file_order_langsung', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique(); $table->string('file_amount');
            $table->string('file_path_1');
            $table->string('file_path_2')->nullable(); $table->string('file_path_3')->nullable(); $table->string('file_path_4')->nullable(); $table->string('file_path_5')->nullable();
            $table->timestamps();
                     $table->foreign('order_id')->references('order_id')->on('orders_langsung')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_order_langsung');
    }
};

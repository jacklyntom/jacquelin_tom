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
            $table->string('product_name')->nullable();
            $table->Integer('category_id');
            $table->string('price')->nullable();
            $table->string('description')->nullable();
            $table->string('gallery')->nullable();
            $table->boolean('is_active')->default(0);
            $table->boolean('is_deleted')->default(0);
            // $table->foreign('categorys_id')->references('id')->on('categories');
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

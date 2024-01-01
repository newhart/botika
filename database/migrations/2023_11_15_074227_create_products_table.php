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
            $table->string('name');
            $table->string('type');
            $table->string('brand')->nullable();
            $table->string('unit')->nullable();
            $table->text('description');
            $table->string('tags');
            $table->string('status');
            $table->float('price');
            $table->float('compare_at_price');
            $table->float('cos_per_item');
            $table->float('weight')->nullable();
            $table->integer('stock');
            $table->string('dimensions');
            $table->string('meta_description')->nullable();
            $table->string('page_title')->nullable();
            $table->string('sku')->unique();
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

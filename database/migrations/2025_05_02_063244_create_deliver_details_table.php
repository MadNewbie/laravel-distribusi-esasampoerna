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
        Schema::create('deliver_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('deliver_id')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->foreignId('stock')->nullable();
            $table->timestamps();

            $table->foreign('deliver_id')->references('id')->on('delivers')->onDelete('restrict');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliver_details');
    }
};

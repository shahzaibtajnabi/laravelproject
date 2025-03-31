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
            $table->string('tracking_number')->unique(); // Optional, if using a unique tracking number
            $table->string('customer_name');
            $table->text('address');
            $table->string('city');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->text('order_notes')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->string('product_name');
            $table->text('product_desc');
            $table->decimal('product_price', 10, 2);
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2);
            $table->string('payment_method');
            $table->string('Ostatus')->default('pending');
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

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

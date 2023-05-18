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
            $table->id(); // Order ID: A unique identifier for each order placed in the online store.
            $table->foreignId('customer_id')->references('id')->on('users');
            $table->string('payment_status'); // Payment Details: Information about the payment status for the order.
            $table->string("payment_method"); // Payment
            $table->string('order_status'); // Order Status: The current status of the order.
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

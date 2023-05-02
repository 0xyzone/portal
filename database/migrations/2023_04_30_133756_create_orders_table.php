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
            $table->integer('company_id');
            $table->integer('user_id');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->longText('customer_address');
            $table->string('in_out');
            $table->bigInteger('phone');
            $table->bigInteger('alt_phone')->nullable();
            $table->integer('price')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('delivery_charge')->nullable();
            $table->integer('advance')->nullable();
            $table->integer('due');
            $table->string('mode_of_payment');
            $table->string('payment_status');
            $table->string('order_status');
            $table->longText('note');
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

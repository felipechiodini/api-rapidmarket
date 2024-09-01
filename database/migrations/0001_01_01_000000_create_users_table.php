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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
        });

        Schema::create('store_configurations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->references('id')->on('stores');
            $table->string('key');
            $table->string('value');
        });

        Schema::create('store_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->references('id')->on('stores');
        });

        Schema::create('store_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->references('id')->on('stores');
            $table->string('name');
        });

        Schema::create('store_customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->references('id')->on('stores');
            $table->string('name');
            $table->string('email');
            $table->string('cellphone');
            $table->string('password');
        });

        Schema::create('store_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->references('id')->on('stores');
            $table->foreignId('category_id')->references('id')->on('store_categories');
            $table->string('name');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->float('price');
            $table->float('price_from')->nullable();
        });

        Schema::create('product_configurations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('store_products');
            $table->string('key');
            $table->string('value');
        });

        Schema::create('customer_cart', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->references('id')->on('store_customers');
            $table->boolean('open');
        });

        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->references('id')->on('customer_cart')->cascadeOnDelete();
            $table->foreignId('product_id')->references('id')->on('store_products');
            $table->float('price');
            $table->integer('quantity');
        });

        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->references('id')->on('store_customers')->cascadeOnDelete();
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('postal_code');
        });

        Schema::create('customer_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->references('id')->on('store_customers');
            $table->string('status');
            $table->float('total');
            $table->float('subtotal');
            $table->float('discount');
            $table->float('delivery_fee');
            $table->timestamp('requested_at')->nullable();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('customer_orders');
            $table->foreignId('product_id')->references('id')->on('store_products');
            $table->float('price');
            $table->integer('quantity');
        });

        Schema::create('order_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('customer_orders');
            $table->string('status');
            $table->string('type');
            $table->string('identifier')->nullable();
            $table->float('value');
            $table->timestamp('paid_at')->nullable();
        });

        Schema::create('order_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('customer_orders');
            $table->foreignId('product_id')->references('id')->on('store_products');
            $table->float('price');
            $table->integer('quantity');
        });

        Schema::create('order_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('customer_orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

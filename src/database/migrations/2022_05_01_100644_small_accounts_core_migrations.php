<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('smallaccounts.tables.customers'), function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create(config('smallaccounts.tables.sales_orders'), function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->timestamps();
        });

        Schema::create(config('smallaccounts.tables.sales_order_lines'), function (Blueprint $table) {
            $table->id();
            $table->integer('sales_order_id');
            $table->integer('product_id');
            $table->timestamps();
        });

        Schema::create(config('smallaccounts.tables.sales_invoices'), function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->timestamps();
        });

        Schema::create(config('smallaccounts.tables.sales_invoice_lines'), function (Blueprint $table) {
            $table->id();
            $table->integer('sales_invoice_id');
            $table->integer('sales_order_line_id');
            $table->integer('product_id');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('smallaccounts.tables.customers'));
        Schema::dropIfExists(config('smallaccounts.tables.sales_orders'));
        Schema::dropIfExists(config('smallaccounts.tables.sales_order_lines'));
        Schema::dropIfExists(config('smallaccounts.tables.sales_invoices'));
        Schema::dropIfExists(config('smallaccounts.tables.sales_invoice_lines'));
        Schema::dropIfExists(config('smallaccounts.tables.products'));
    }
};

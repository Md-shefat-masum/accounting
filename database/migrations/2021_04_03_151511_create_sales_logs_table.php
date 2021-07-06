<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('creator')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('is_quote')->nullable();
            $table->text('quote_description')->nullable();
            $table->integer('is_sales_order')->nullable();
            $table->text('sales_order_description')->nullable();
            $table->integer('is_delivery_note')->nullable();
            $table->text('delivery_note_description')->nullable();
            $table->integer('is_invoice')->nullable();
            $table->text('invoice_description')->nullable();
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
        Schema::dropIfExists('sales_logs');
    }
}

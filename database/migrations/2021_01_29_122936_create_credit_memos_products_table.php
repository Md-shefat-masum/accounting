<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditMemosProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_memos_products', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->integer('credit_memo_id')->nullable();
            $table->integer('description')->nullable();
            $table->integer('qty')->nullable();
            $table->double('sales_price')->nullable();
            $table->double('purchase_price')->nullable();
            $table->integer('disc')->nullable();
            $table->double('total_price')->nullable();
            $table->integer('vat_on_sales')->nullable();
            $table->string('creator',100)->nullable();
            $table->string('slug',100)->nullable();
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
        Schema::dropIfExists('credit_memos_products');
    }
}

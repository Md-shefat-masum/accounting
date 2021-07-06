<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saleorders', function (Blueprint $table) {
            $table->id();
            $table->string('customer')->nullable();
            $table->string('code')->nullable();
            $table->string('recipient')->nullable();
            $table->string('po_number')->nullable();
            $table->string('address')->nullable();
            $table->string('date')->nullable();
            $table->string('status')->nullable();
            $table->string('currency')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('payment_terms')->nullable();

            $table->string('document_note')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('discount_rate')->nullable();
            $table->string('discount_amount')->nullable();
            $table->string('vat')->nullable();
            $table->string('total')->nullable();

            $table->string('delivery_contact')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('project')->nullable();
            $table->string('assigned_to')->nullable();
            $table->string('private_note')->nullable();
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
        Schema::dropIfExists('saleorders');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaseorders', function (Blueprint $table) {
            $table->id();
            $table->string('supplier');
            $table->string('address')->nullable();
            $table->string('recipient')->nullable();
            $table->string('ref_number')->nullable();
            $table->string('date')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('currency')->nullable();
            $table->string('product')->nullable();
            $table->text('document_note')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('discount_rate')->nullable();
            $table->string('discount_amount')->nullable();
            $table->string('vat')->nullable();
            $table->string('total')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('type')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('project')->nullable();
            $table->string('delivery_status')->nullable();
            $table->string('billing_status')->nullable();
            $table->string('assigned_to')->nullable();
            $table->string('private_note')->nullable();
            $table->text('attachments')->nullable();
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
        Schema::dropIfExists('purchaseorders');
    }
}

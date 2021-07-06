<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliverynotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliverynotes', function (Blueprint $table) {
            $table->id();
            $table->string('customer');
            $table->string('recipient')->nullable();
            $table->text('address')->nullable();
            $table->string('delivery_method')->nullable();
            $table->string('po_number')->nullable();
            $table->string('date')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('currency')->nullable();
            $table->string('is_product')->nullable();
            $table->string('document_note')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('discount_rate')->nullable();
            $table->string('discount_amount')->nullable();
            $table->string('vat')->nullable();
            $table->string('total')->nullable();

            $table->string('end_of_delivery')->nullable();
            $table->string('delivery_contact')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('delivery_weight')->nullable();
            $table->string('weight_unit')->nullable();
            $table->string('project')->nullable();
            $table->string('sales_rep')->nullable();
            $table->string('private_note')->nullable();
            $table->string('attachments')->nullable();
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
        Schema::dropIfExists('deliverynotes');
    }
}

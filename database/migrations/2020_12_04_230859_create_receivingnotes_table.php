<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivingnotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivingnotes', function (Blueprint $table) {
            $table->id();
            $table->string('supplier');
            $table->string('address');
            $table->string('recipient');
            $table->string('ref_number');
            $table->string('date');
            $table->string('payment_terms');
            $table->string('currency');
            $table->string('is_product');
            $table->string('document_note');
            $table->string('subtotal');
            $table->string('discount_rate');
            $table->string('discount_amount');
            $table->string('vat');
            $table->string('total');

            $table->string('delivery_date');
            $table->string('expected_delivery');
            $table->string('type');
            $table->string('delivery_address');
            $table->string('project');
            $table->string('delivery_status');
            $table->string('invoicing_status');
            $table->string('assigned_to');
            $table->string('private_note');
            $table->string('attachments');
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
        Schema::dropIfExists('receivingnotes');
    }
}

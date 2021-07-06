<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliercreditmemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliercreditmemos', function (Blueprint $table) {
            $table->id();
            $table->string('supplier');
            $table->text('address');
            $table->string('recipient');
            $table->string('ref_number');
            $table->string('date');
            $table->string('payment_terms');
            $table->string('currency');
            $table->string('is_product');
            $table->string('is_expenses');
            $table->string('document_note');
            $table->string('subtotal');
            $table->string('discount_rate');
            $table->string('discount_amount');
            $table->string('vat_amount');
            $table->string('total');
            $table->string('delivery_date');
            $table->string('type');
            $table->string('delivery_address');
            $table->string('project');
            $table->string('delivery_status');
            $table->string('billing_status');
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
        Schema::dropIfExists('suppliercreditmemos');
    }
}

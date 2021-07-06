<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('customer');
            $table->string('date')->nullable();
            $table->string('recipient')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('address')->nullable();
            $table->string('currency')->nullable();

            $table->boolean('is_upload')->nullable();

            $table->string('deposit_to')->nullable();
            $table->string('product')->nullable();

            $table->text('document_note')->nullable();
            $table->string('sub_total')->nullable();
            $table->string('discount_amount')->nullable();
            $table->string('vat')->nullable();
            $table->string('total')->nullable();

            $table->string('delivery_contact')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('po_number')->nullable();
            $table->string('project')->nullable();
            $table->string('assigned_to')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}

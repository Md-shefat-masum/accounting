<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('supplier');
            $table->string('ref_number');
            $table->string('address');
            $table->string('recipient')->nullable();
            $table->string('date')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('currency')->nullable();
            $table->boolean('is_unpaid')->nullable();
            $table->boolean('is_settled')->nullable();
            $table->boolean('bank')->nullable();
            $table->string('products')->nullable();
            $table->string('expenses')->nullable();

            $table->string('document_note')->nullable();
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
            $table->text('private_note')->nullable();
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
        Schema::dropIfExists('bills');
    }
}

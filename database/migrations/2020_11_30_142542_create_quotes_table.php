<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('customer');
            $table->string('date');
            $table->string('recipient')->nullable();
            $table->string('status')->nullable();
            $table->text('address')->nullable();
            $table->string('expiration_date');
            $table->string('payment_terms')->nullable();
            $table->string('currency')->nullable();

            $table->string('products')->nullable();
            $table->text('document_note')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('discount_rate')->nullable();
            $table->string('discount_amount')->nullable();
            $table->string('vat')->nullable();
            $table->string('total')->nullable();

            $table->string('delivery_contact')->nullable();
            $table->text('delivery_address')->nullable();
            $table->string('project')->nullable();
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
        Schema::dropIfExists('quotes');
    }
}

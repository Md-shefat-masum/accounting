<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditmemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditmemos', function (Blueprint $table) {
            $table->id();
            $table->string('customer');
            $table->string('date')->nullable();
            $table->string('recipient')->nullable();
            $table->string('payment_terms')->nullable();
            $table->text('address')->nullable();
            $table->string('currency')->nullable();
            $table->string('products')->nullable();
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
        Schema::dropIfExists('creditmemos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->string('paid_by')->nullable();
            $table->string('billing_date')->nullable();
            $table->string('receipts_category')->nullable();
            $table->boolean('is_paid')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('paid_on')->nullable();
            $table->string('bank')->nullable();
            $table->string('transaction_id')->nullable();
            $table->text('attachments')->nullable();
            $table->string('project')->nullable();
            $table->string('assigned_to')->nullable();
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
        Schema::dropIfExists('receipts');
    }
}

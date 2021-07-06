<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingpaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billingpayments', function (Blueprint $table) {
            $table->id();
            $table->string('bank');
            $table->string('currency')->nullable();
            $table->string('date')->nullable();
            $table->string('supplier')->nullable();
            $table->string('bill')->nullable();
            $table->string('pay')->nullable();
            $table->string('type')->nullable();
            $table->string('payment_date')->nullable();
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
        Schema::dropIfExists('billingpayments');
    }
}

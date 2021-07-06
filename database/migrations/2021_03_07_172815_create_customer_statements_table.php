<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_statements', function (Blueprint $table) {
            $table->id();

            $table->integer('customer_id')->nullable();
            $table->integer('invoice_id')->nullable();
            $table->integer('receipt_id')->nullable();
            $table->text('receipt_appliedto')->nullable();
            $table->double('amount')->default(0);
            $table->string('date',100)->nullable();

            $table->string('creator',100)->nullable();
            $table->string('slug',100)->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('customer_statements');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('paid_to');
            $table->string('billing_date');
            $table->string('category');
            $table->string('currency');
            $table->boolean('is_paid');
            $table->string('payment_method');
            $table->string('paid_on');
            $table->string('bank');
            $table->string('transaction_id');
            $table->string('attachments');
            $table->string('project');
            $table->string('assigned');
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
        Schema::dropIfExists('expenses');
    }
}

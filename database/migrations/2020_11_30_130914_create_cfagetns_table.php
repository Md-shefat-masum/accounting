<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCfagetnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cfagetns', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('email');
            $table->string('phone');
            $table->string('cf_license_number')->nullable();
            $table->string('website')->nullable();

            $table->string('billing_address')->nullable();
            $table->string('line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country')->nullable();
            $table->string('working_port')->nullable();

            $table->string('payment_terms')->nullable();
            $table->string('price_family')->nullable();
            $table->string('currency')->nullable();
            $table->string('business_code')->nullable();
            $table->string('opt_in_email')->nullable();
            $table->string('assigned_to')->nullable();
            $table->string('reference_account')->nullable();
            $table->string('starting_balance')->nullable();
            $table->string('date_as')->nullable();
            $table->text('note')->nullable();
            $table->text('files')->nullable();
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
        Schema::dropIfExists('cfagetns');
    }
}

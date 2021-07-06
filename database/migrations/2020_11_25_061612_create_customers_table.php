<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_company')->nullable();
            $table->string('company_name')->nullable();

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();

            $table->string('vat_number')->nullable();
            $table->string('is_pickup_only_customer')->nullable();

            $table->string('billing_address')->nullable();
            $table->string('line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country')->nullable();

            $table->boolean('is_same_delivery')->nullable();
            $table->string('contacts')->nullable();

            $table->string('payment_terms')->nullable();
            $table->string('price_family')->nullable();
            $table->string('currency')->nullable();
            $table->string('sales_tax')->nullable();
            $table->boolean('is_vat')->nullable();
            $table->string('business_code')->nullable();
            $table->boolean('opt_in_to_emails')->nullable();
            $table->string('assigned_to')->nullable();
            $table->string('reference_account')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('customers');
    }
}

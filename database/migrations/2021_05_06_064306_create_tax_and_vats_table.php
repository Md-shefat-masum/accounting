<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxAndVatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_and_vats', function (Blueprint $table) {
            $table->id();
            $table->string('tax_name',100)->nullable();
            $table->string('abbreviation',100)->nullable();
            $table->float('tax_rate')->default(0);
            $table->string('description',100)->nullable();
            $table->string('your_tax_number',100)->nullable();
            $table->tinyInteger('show_tax_number_on_invoice')->default(0);
            $table->tinyInteger('is_this_tax_recoverable')->default(0);
            $table->integer('creator')->nullable();
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
        Schema::dropIfExists('tax_and_vats');
    }
}

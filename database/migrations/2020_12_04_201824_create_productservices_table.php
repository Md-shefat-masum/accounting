<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productservices', function (Blueprint $table) {
            $table->id();
            $table->string('is_services')->nullable();
            $table->string('name');
            $table->string('unit')->nullable();
            $table->string('sales_price')->nullable();
            $table->string('purchase_price')->nullable();
            $table->string('item_number')->nullable();
            $table->text('description')->nullable();
            $table->string('family')->nullable();

            $table->text('private_note')->nullable();
            $table->string('income_account')->nullable();
            $table->string('vat_on_sales')->nullable();

            $table->boolean('is_track_inventory')->nullable();
            $table->string('valuation_costing')->nullable();
            $table->string('authorize_negative_stock')->nullable();
            $table->string('minimum_stock_quantity')->nullable();
            $table->string('receiving_location')->nullable();
            $table->string('picking_delivery_location')->nullable();
            $table->string('inventory_account')->nullable();
            $table->string('inventory_transit_account')->nullable();


            $table->string('net_weight')->nullable();
            $table->string('width')->nullable();
            $table->string('length')->nullable();
            $table->string('height')->nullable();
            $table->string('dimension_unit')->nullable();
            $table->string('cogs_account')->nullable();
            $table->string('vat_on_purchases')->nullable();
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
        Schema::dropIfExists('productservices');
    }
}

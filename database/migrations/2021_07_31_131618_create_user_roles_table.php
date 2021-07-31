<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('role_name',100)->nullable();
            $table->string('code',100)->nullable();
            $table->text('description')->nullable();
            $table->longText('read_permission')->nullable();
            $table->longText('create_permission')->nullable();
            $table->longText('update_permission')->nullable();
            $table->longText('delete_permission')->nullable();

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
        Schema::dropIfExists('user_roles');
    }
}

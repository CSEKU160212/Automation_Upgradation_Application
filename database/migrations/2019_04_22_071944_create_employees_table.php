<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('employees')){
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('users_id')->unsigned();
            $table->bigInteger('roles_id')->unsigned();
            $table->bigInteger('sections_id')->unsigned();
            $table->bigInteger('disciplines_id')->unsigned()->nullable();
            $table->date('upgradation_date');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('roles_id')->references('id')->on('roles');
            $table->foreign('sections_id')->references('id')->on('sections');
            $table->foreign('disciplines_id')->references('id')->on('disciplines');
        });
    }
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}

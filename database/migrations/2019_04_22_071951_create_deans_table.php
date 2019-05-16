<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('deans')){
        Schema::create('deans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('schools_id')->unsigned();
            $table->bigInteger('employees_id')->unsigned();
            $table->timestamps();
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
        Schema::dropIfExists('deans');
    }
}

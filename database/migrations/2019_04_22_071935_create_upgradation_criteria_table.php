<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpgradationCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('upgradation_criteria')){
        Schema::create('upgradation_criteria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('criteria');
            $table->bigInteger('roles_id')->unsigned();
            $table->timestamps();

            $table->foreign('roles_id')->references('id')->on('roles');
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
        Schema::dropIfExists('upgradation_criteria');
    }
}

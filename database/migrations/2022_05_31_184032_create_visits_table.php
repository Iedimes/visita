<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->integer('CI');
            $table->string('Full_Name');
            $table->string('First_Surname');
            $table->string('Second_Surname');
            $table->string('Married_Surname');
            $table->string('First_Name');
            $table->string('Second_Name');
            $table->string('Reason');
            $table->string('Observation');
            $table->datetime('Entry_Datetime');
            $table->datetime('Exit_Datetime');
            $table->integer('state_id');
            $table->foreign('state_id')->references('id')->on('states');
            $table->integer('dependency_id');
            $table->foreign('dependency_id')->references('id')->on('dependencies');
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
        Schema::dropIfExists('visits');
    }
}

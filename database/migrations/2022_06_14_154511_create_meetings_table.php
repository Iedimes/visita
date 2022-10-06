<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->integer('CI');
            $table->string('Names');
            $table->string('First_Names');
            $table->string('Reason');
            $table->string('Observation');
            $table->string('With_whom');
            $table->datetime('Meeting_Date');
            $table->datetime('Entry_Datetime');
            $table->datetime('Exit_Datetime');
            $table->integer('state_id');
            $table->foreign('state_id')->references('id')->on('states');
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
        Schema::dropIfExists('meetings');
    }
}

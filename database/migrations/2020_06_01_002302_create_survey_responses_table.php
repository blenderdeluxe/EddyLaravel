<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_responses', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('fk_survey')->unsigned();
            $table->foreign('fk_survey')->references('id')->on('surveys');

            $table->bigInteger('fk_question')->unsigned();
            $table->foreign('fk_question')->references('id')->on('questions');

            $table->bigInteger('fk_answer')->unsigned();
            $table->foreign('fk_answer')->references('id')->on('answers');

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
        Schema::dropIfExists('survey_responses');
    }
}

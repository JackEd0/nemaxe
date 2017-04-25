<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExercisesQuestionsEqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercises_questions_eqs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->unsigned();
            $table->integer('exercise_id')->unsigned();
            $table->integer('question_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercises_questions_eqs');
    }
}

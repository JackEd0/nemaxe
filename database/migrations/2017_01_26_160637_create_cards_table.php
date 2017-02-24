<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('card_type_id')->unsigned();
            // AAAA-MM-JJ
            $table->date('year');
            $table->integer('subject_id')->unsigned();
            $table->integer('field_id')->unsigned();
            $table->integer('grade_id')->unsigned();
            $table->string('status')->default('publish');
            $table->integer('user_id')->unsigned()->default('1');;
            // nature is exercise or solution
            // $table->string('nature');
            // $table->integer('twin_id')->unsigned()->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}

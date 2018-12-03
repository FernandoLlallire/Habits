<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("description");
            $table->integer("step_1");
            $table->integer("step_2");
            $table->integer("step_3");
            $table->integer("step_4");
            $table->integer("step_5");
            $table->string("description_step_1");
            $table->string("description_step_2");
            $table->string("description_step_3");
            $table->string("description_step_4");
            $table->string("description_step_5");
            $table->integer("points")->nullable();
            // $table->timestamp('challenge_completed')->nullable();
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
        Schema::dropIfExists('challenges');
    }
}

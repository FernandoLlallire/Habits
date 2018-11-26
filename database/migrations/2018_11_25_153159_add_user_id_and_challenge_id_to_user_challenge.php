<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdAndChallengeIdToUserChallenge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_challenge', function (Blueprint $table) {
          $table->unsignedInteger("user_id");
          $table->foreign("user_id")->references("id")->on("users");
          $table->unsignedInteger("challenge_id");
          $table->foreign("challenge_id")->references("id")->on("challenges");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_challenge', function (Blueprint $table) {
          $table->dropForeign("user_challenge_challenge_id_foreign");
          $table->dropForeign("user_challenge_user_id_foreign");
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdAndFriendIdToFriends extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('friends', function (Blueprint $table) {
          $table->unsignedInteger("user_id");
          $table->foreign("user_id")->references("id")->on("users");
          $table->unsignedInteger("friend_id");
          $table->foreign("friend_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('friends', function (Blueprint $table) {
          $table->dropForeign("friends_user_id_foreign");
          $table->dropForeign("friends_friend_id_foreign");
        });
    }
}

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
          $table->unsignedInteger("follower_id");
          $table->foreign("follower_id")->references("id")->on("users");
          $table->unsignedInteger("following_id");
          $table->foreign("following_id")->references("id")->on("users");
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

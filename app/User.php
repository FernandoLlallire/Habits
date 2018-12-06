<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'firstName',
      'lastName',
      'email',
      'userName',
      'country',
      'theme',
      'password',
      'remember_token',
      'avatar',
      'province'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function following() {
      return $this->belongsToMany(User::class, 'friends', 'follower_id', 'following_id');
    }

// users that follow this user
    public function followers() {
      return $this->belongsToMany(User::class, 'friends', 'following_id', 'follower_id');
    }

    public function challenges(){
      return $this->hasMany(Challenge::class, "challenges", "id", "challenge_id");
    }

}

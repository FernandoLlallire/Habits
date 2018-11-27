<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  $fillable = ["name", "description"];

  public function challenges(){
    return $this->hasMany(Challenge::class, "challenges", "id", "challenge_id");
  }
}

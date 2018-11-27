<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
  $fillable = ["name", "description", "step_1", "step_2", "step_3", "step_4", "step_5", "description_step_1", "description_step_2", "description_step_3", "description_step_4", "description_step_5", "category_id", "challenge_completed"];

  public function challenges(){
    return $this->belongsTo(User::class, "users", "id", "user_id");
  }

  public function category(){
    return $this->belonsTo(Category::class, "categories", "id", "category_id");
  }
}

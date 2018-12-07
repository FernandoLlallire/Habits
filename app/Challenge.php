<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
  protected $fillable = ["name", "description", "step_1", "step_2", "step_3", "step_4", "step_5", "description_step_1", "description_step_2", "description_step_3", "description_step_4", "description_step_5", "category_id","user_id"];

  public function user(){
    return $this->belongsTo(User::class);
  }

  public function category(){
    return $this->belongsTo(Category::class,'category_id', 'id');
  }
}
//PHP ARTISAN ROUTE:LINK

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  protected $guarded = array('id');

  public static $rules = array(
    'user_id' => 'required',
    'post_id' => 'required',
  );

  public function user(){
    return $this->belongsTo('App\User');
  }
  public function post(){
    return $this->belongsTo('App\User');
  }

}

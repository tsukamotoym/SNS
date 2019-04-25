<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
      'content' => 'required|max:140',
//      'user_id' => 'required',
    );

    public function user(){
      return $this->belongsTo('App\User');
    }
    public function like(){
      return $this->hasMany('App\Like');
    }
}

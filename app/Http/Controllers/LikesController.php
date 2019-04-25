<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;

class LikesController extends Controller
{
    public function create($post_id){
//      $this->validate($request,Like::$rules);
      $like = new Like;
      $like->user_id = session('login_id');
      $like->post_id = $post_id;
      $like->save();
      $iine = Like::where('user_id',session('login_id'))->where('post_id',$post_id)->first();
      return view("posts.show",['iine' => $iine]);
    }
}

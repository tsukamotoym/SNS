<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

//use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    //　投稿一覧ページの表示処理
    public function index(){
      $posts = Post::orderBy('created_at','desc')->get();
      return view('posts.index',['posts' => $posts]);
    }
    //　新規作成ページの表示処理
    public function new(){
      return view('posts.new');
    }
    //　新規投稿処理
    public function create(Request $request){
      $this->validate($request,Post::$rules);
      $post = new Post;
      $post->content = $request->content;
      $post->user_id = session('login_id');
      $post->save();
      return redirect('/posts/index')->with('flash_message',"投稿を作成しました");
    }
    //　編集ページの表示処理
    public function edit($id){
      $post = Post::find($id);
      return view('posts.edit',['post' => $post]);
    }
    //編集処理
    public function update(Request $request,$id){
      $this->validate($request,Post::$rules);
      $post = Post::find($id);
      $post->content = $request->content;
      $post->save();
      return redirect('/posts/index')->with('flash_message',"投稿を編集しました");
    }

    //削除処理
    public function destroy($id){
      Post::find($id)->delete();
      return redirect('/posts/index')->with('flash_message',"投稿を削除しました");
    }
    
    //詳細ページの表示処理
    public function show($id){
      $post = Post::find($id);
      return view('posts.show',['post' => $post]);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
//use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(){
      $users = User::all();
      return view('users.index',['users' => $users]);
    }

    public function new(){
      return view('users.new');
    }

    public function create(Request $request){
      $this->validate($request,User::$rules);
      $user = new User;
      $form = $request->all();
      unset($form['_token']);
      $user->fill($form)->save();
      $request->session()->put('login_id',$user->id);
      $request->session()->put('login_name',$user->name);
      return redirect("/users/{$user->id}")->with('flash_message','ユーザ登録が完了しました');
    }

    public function edit($id){
      $user = User::find($id);
      return view('users.edit',['user' => $user]);
    }

    public function update(Request $request,$id){
      $this->validate($request,User::$rules);
      $user = User::find($id);
      $form = $request->all();
      unset($form['_token']);
      $user->fill($form)->save();
      return redirect("/users/{$user->id}")->with('flash_message','ユーザー情報を編集しました');
    }


    public function show($id){
      $user = User::find($id);
      return view('users.show',['user' => $user]);
    }

    public function login_form(Request $request){
      return view('users.login_form');
    }


    public function login(Request $request){
      $email = $request->email;
      $password = $request->password;
      $user =User::where('email',$email)->where('password',$password)->first();
      if ($user != null){
        $request->session()->put('login_id',$user->id);
        $request->session()->put('login_name',$user->name);
        return redirect("/posts/index")->with('flash_message','ログインしました');
      } else {
        $error_msg = "メールアドレスまたはパスワードが間違っています";
        return redirect()->view('users.login_form',['error_msg' => $error_msg]);
      }

    }

    public function logout(Request $request){
      session()->forget('login_id');
      session()->forget('login_name');
      return redirect('/login');
    }

}

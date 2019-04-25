@extends('layouts.layout')

@section('title','Login')

@section('content')
<div class="main users-new">
  <div class="container">
    <div class="form-heading">ログイン</div>
    <div class="form users-form">
      <div class="form-body">

        @isset ($error_msg)
          <div class="form-error">
            <ul>
              <li>{{$error_msg}}</li>
            </ul>
          </div>
        @endisset

        <form action="/login" method="post">
          {{ csrf_field() }}
          <p>メールアドレス</p>
          <input name="email" value="{{old('email')}}">
          <p>パスワード</p>
          <input type="password" name="password" value="{{old('password')}}">
          <input type="submit" value="ログイン">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

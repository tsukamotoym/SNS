@extends('layouts.layout')

@section('title','New-user')

@section('content')
<div class="main users-new">
  <div class="container">
    <div class="form-heading">新規ユーザー登録</div>
    <div class="form users-form">
      <div class="form-body">

        @if (count($errors)>0)
          <div class="form-error">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="/users/create" method="post">
          {{ csrf_field() }}
          <p>ユーザー名</p>
          <input name="name">

          <p>メールアドレス</p>
          <input name="email">
          <p>パスワード</p>
          <input type="password" name="password">


          <input type="submit" value="新規登録">
       </form>
      </div>
    </div>
  </div>
</div>
@endsection

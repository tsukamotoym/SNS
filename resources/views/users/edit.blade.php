@extends('layouts.layout')

@section('title','Edit-user')

@section('content')
<div class="main users-edit">
  <div class="container">
    <div class="form-heading">ユーザー情報の編集</div>
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
          <form action="/users/{{$user->id}}/update" method=post>
            {{csrf_field()}}
            <p>ユーザー名</p>
            @if (count($errors)>0)
              <input name="name" value="{{old('name')}}">
            @else
              <input name="name" value="{{$user->name}}">
            @endif
            <p>画像</p>
            <input name="image" type="file">
            <p>メールアドレス</p>
            @if (count($errors)>0)
              <input name="email" value="{{old('email')}}">
            @else
              <input name="email" value="{{$user->email}}">
            @endif
            <input type="submit" value="保存">
          </form>

      </div>
    </div>
  </div>
</div>
@endsection

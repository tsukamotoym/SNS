@extends('layouts.layout')

@section('title','New')

@section('content')
<div class="main posts-new">
  <div class="container">
    <h1 class="form-heading">編集する</h1>
    <div class="form">
      <div class="form-body">
        @if (count($errors)>0)
          <div class="form-error">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          <form action="/posts/{{$post->id}}/update" method="post">
            {{ csrf_field() }}
            <textarea name="content">{{old('content')}}</textarea>
            <input type="submit" value="保存">
          </form>
        @else
          <form action="/posts/{{$post->id}}/update" method="post">
            {{ csrf_field() }}
            <textarea name="content">{{$post->content}}</textarea>
            <input type="submit" value="保存">
          </form>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection

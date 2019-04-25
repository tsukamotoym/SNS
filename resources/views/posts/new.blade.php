@extends('layouts.layout')

@section('title','New-post')

@section('content')
<div class="main posts-new">
  <div class="container">
    <h1 class="form-heading">投稿する</h1>
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
        @endif
        <form action="/posts/create" method="post">
          {{ csrf_field() }}
          <textarea name="content">{{old('content')}}</textarea>
          <input type="submit" value="投稿">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

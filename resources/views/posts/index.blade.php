@extends('layouts.layout')

@section('title','Index-post')

@section('content')
<div class="main posts-index">
  <div class="container">
    @foreach ($posts as $post)
    <div class="posts-index-item">
      <div class="post-left">
        <img src="/user_images/{{$post->user->image_name}}">
      </div>
      <div class="post-right">
        <div class="post-user-name">
          <a href="/users/{{$post->user->id}}">{{$post->user->name}}</a>
        </div>
        {{ link_to("/posts/{$post->id}",$post->content) }}
      </div>
    </div>
   @endforeach
  </div>
</div>
@endsection

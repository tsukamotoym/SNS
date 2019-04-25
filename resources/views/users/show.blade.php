@extends('layouts.layout')

@section('title','Dtails-user')

@section('content')
<div class="main user-show">
  <div class="container">
    <div class="user">
      <img src="/user_images/{{$user->image_name}}" >
      <h2>{{$user->name}}</h2>
      <p>{{$user->email}}</p>
      @if ($user->id == session('login_id'))
        {{ link_to("/users/{$user->id}/edit","編集") }}
      @endif
    </div>

    @foreach ($user->posts as $post)
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

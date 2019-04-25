@extends('layouts.layout')

@section('title','Dtails-post')

@section('content')
<div class="main posts-show">
  <div class="container">
    <div class="posts-show-item">
      <div class="post-user-name">
        <img src="/user_images/{{$post->user->image_name}}">
        <a href="/users/{{$post->user->id}}">{{$post->user->name}}</a>
      </div>
      <p>{{$post->content}}</p>
      <div class="post-time">
        {{$post->created_at}}
      </div>
<!--
      @isset ($iine)
        いいね！済み
      @else
        <form action="/likes/{{$post->id}}/create" method="post">
          {{csrf_field()}}
          <input type="submit" value="いいね！">
        </form>
      @endisset
-->
      @if ($post->user->id == session('login_id'))
      <div class="post-menus">
        {{ link_to("/posts/{$post->id}/edit","編集") }}
        <form action="/posts/{{$post->id}}/destroy" method="post">
          {{csrf_field()}}
          <input type="submit" value="削除">
        </form>
      </div>
      @endif

    </div>
  </div>
</div>
@endsection

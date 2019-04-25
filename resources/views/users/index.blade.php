@extends('layouts.layout')

@section('title','Index-user')

@section('content')
<div class="main users-index">
  <div class="container">
    @foreach ($users as $user)
    <div class="users-index-item">
      <div class="user-left">
        <img src="/user_images/{{$user->image_name}}" >
      </div>
      <div class="user-right">
        {{ link_to("/users/{$user->id}",$user->name) }}
      </div>
    </div>
   @endforeach
  </div>
</div>
@endsection

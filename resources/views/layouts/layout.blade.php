<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/users.css') }}">
</head>


<body>
<header>
  <div class="header-logo">
    {{ link_to('/',"Tweeeeet") }}
  </div>
  <ul class="header-menus">
    @if (session('login_name'))
    <li>
      <?php $current_id = session('login_id');
      $url = url("/users/{$current_id}"); ?>
    <a href="{{$url}}"><font color="yellow">{{session('login_name')}}</font></a>
    </li>

    <li>
      {{ link_to('/posts/index',"投稿一覧") }}
    </li>
    <li>
      {{ link_to('/posts/new',"新規投稿") }}
    </li>
    <li>
      {{ link_to('/users/index',"ユーザ一覧") }}
    </li>
    <li>
      <form action="/logout" method="post">
        {{csrf_field()}}
        <input type="submit" value="ログアウト">
      </form>
    </li>
    @else
    <li>
      {{ link_to('/about',"Tweeeeetとは") }}
    </li>
    <li>
      {{ link_to('/signup',"新規登録") }}
    </li>
    <li>
      {{ link_to('/login',"ログイン") }}
    </li>
    @endif
  </ul>

</header>

@if (session('flash_message'))
  <div class="flash">
    {{session('flash_message')}}
  </div>
@endif
<div>
  @yield('content')
</div>

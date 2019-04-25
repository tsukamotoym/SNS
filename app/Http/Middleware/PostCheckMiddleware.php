<?php

namespace App\Http\Middleware;

use Closure;
use App\Post;
//use App\User;


class PostCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $post = Post::find($request->id)->first();
      $id = $post->user->id;
      if (session('login_id') == $id){
        return $next($request);
      }else{
        return redirect('/');
      }
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/
//use \App\Http\Middleware\LoginMiddleware;

//トップページ
Route::get('/','HomeController@top');
//tweeeeetについての説明ページ
Route::get('/about','HomeController@about');

//--------------------------------------------------
//投稿一覧ページ
Route::get('/posts/index','PostsController@index')
  ->middleware('logincheck');

//新規投稿ページ
Route::get('/posts/new','PostsController@new')
  ->middleware('logincheck');
Route::post('/posts/create','PostsController@create');

//投稿編集ページ
Route::get('/posts/{id}/edit','PostsController@edit')
  ->middleware('logincheck');
//  ->middleware('postcheck')

Route::post('/posts/{id}/update','PostsController@update');

//投稿削除アクション
Route::post('/posts/{id}/destroy','PostsController@destroy');

//投稿の詳細ページ
Route::get('/posts/{id}','PostsController@show')
  ->middleware('logincheck');

//--------------------------------------------------

//--------------------------------------------------
//ユーザ一覧ページ
Route::get('/users/index','UsersController@index')
  ->middleware('logincheck');


//ユーザ新規登録ページ
Route::get('signup','UsersController@new');
Route::post('/users/create','UsersController@create');

//ユーザ編集ページ
Route::get('/users/{id}/edit','UsersController@edit')
  ->middleware('logincheck')
  ->middleware('usercheck');
Route::post('/users/{id}/update','UsersController@update');


//ユーザ詳細ページ
Route::get('/users/{id}','UsersController@show')
  ->middleware('logincheck');
//--------------------------------------------------

//--------------------------------------------------
//ログインページ
Route::get('/login','UsersController@login_form');
Route::post('/login','UsersController@login');

//ログアウトアクション
Route::post('/logout','UsersController@logout');

//いいね！アクション
Route::post('/likes/{post_id}/create','LikesController@create');

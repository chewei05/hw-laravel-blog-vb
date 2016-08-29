<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ 'as' => 'install.index', 'uses' => 'InstallController@index', function () {
}]);
Route::get('/home', [ 'as' => 'home.index', 'uses' => 'HomeController@index', function () {
}]);
Route::get('/post/{id}', [ 'as' => 'home.post', 'uses' => 'HomeController@show', function () {
}]);

Route::get('/signin', [ 'as' => 'signin.index', 'uses' => 'SigninController@index', function () {
}]);
Route::get('/signout', [ 'as' => 'signout.index', 'uses' => 'SignoutController@index', function () {
}]);

Route::get('/admin', [ 'as' => 'admin.index', 'uses' => 'AdminController@index', function () {
}]);
Route::get('/admin/post', [ 'as' => 'post.index', 'uses' => 'PostController@index', function () {
}]);
Route::get('/admin/post/show/{id}', [ 'as' => 'post.show', 'uses' => 'PostController@show', function () {
}]);
Route::get('/admin/post/modify/{id}', [ 'as' => 'post.modify', 'uses' => 'PostController@edit', function () {
}]);
Route::get('/admin/post/new', [ 'as' => 'post.new', 'uses' => 'PostController@create', function () {
}]);
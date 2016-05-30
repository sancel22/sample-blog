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

Route::get('/login', 'Auth\AuthController@login');
Route::post('/login', 'Auth\AuthController@processLogIn');
Route::get('/logout', 'Auth\AuthController@logout');

Route::get('/', 'PostsController@index');
Route::post('/add', 'PostsController@store');
Route::get('/add', 'PostsController@add');
Route::post('/view/{post}/comments', 'CommentsController@store');
Route::get('/view/{post}', 'PostsController@show');
Route::get('/view/{post}/edit', 'PostsController@edit');
Route::patch('/view/{post}', 'PostsController@update');

Route::resource('users', 'UsersController');

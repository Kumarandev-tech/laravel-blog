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




Route::get('/', 'AllpostController@allpost')->name('allpost');
Auth::routes();
Route::view('log', 'auth.login');
Route::view('reg', 'auth.register');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('Delete/{id}', 'HomeController@Delete')->name('Delete');
Route::get('profile', 'Post\UserProfileController@showprofile')->name('showprofile');
Route::post('profile', 'Post\UserProfileController@update_avatar')->name('update_avatar');
Route::get('create', 'Post\PostConroller@create')->name('create');
Route::post('store', 'Post\PostConroller@store')->name('store');
Route::get('view/{id}', 'HomeController@viewpost')->name('viewpost');
Route::get('search', 'Post\PostConroller@search')->name('search');

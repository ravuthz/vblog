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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', function (){
    Auth::logout();
    return redirect('/');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    
    Route::get('/', 'HomeController@index');
    
    Route::resource('user', 'UserController', ['as' => 'admin']); 
    Route::resource('post', 'PostController', ['as' => 'admin']); 
    
});
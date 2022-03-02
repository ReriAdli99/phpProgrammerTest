<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});
Route::post('/postlogin','LoginController@login');
Route::get('/logout','LoginController@logout');
Route::group(['middleware'=>['auth','checkrole:author']],function(){
    Route::get('/dashboards',function(){
        return view('Author.dashboard');
    });
});
Route::group(['middleware'=>['auth','checkrole:admin']],function(){
    Route::get('/dashboard',function(){
        return view('Admin.dashboard');
    });
    Route::get('/tambahuser',function(){
        return view('Admin.tambah');
    });
    Route::get('/user','LoginController@index');
    Route::post('/postregister','LoginController@register');
    Route::delete('/user/{id}','LoginController@destroy')->name('user.hapus');
    Route::get('/user/edit/{id}','LoginController@edit')->name('user.edit');
    Route::patch('/user/{id}','LoginController@update')->name('user.update');
});
Route::group(['middleware'=>['auth','checkrole:author,admin']],function(){
    Route::get('/tambahpost',function(){
        return view('Author.tambah');
    });
    Route::get('/post','PostController@index');
    Route::post('/posttambah','PostController@store');
    Route::delete('/post/{id}','PostController@destroy')->name('post.hapus');
    Route::get('/post/edit/{id}','PostController@edit')->name('post.edit');
    Route::patch('/post/{id}','PostController@update')->name('post.update');
});
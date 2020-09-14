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

Route::get('/','GuestController@index')->name('home');
Route::resource('/admin', 'AdminController');
Route::get('/about','GuestController@about');
Route::get('/services','GuestController@services');
Route::get('/submit/poll','GuestController@submit');
Route::get('/home', 'GuestController@index')->name('home');
Route::middleware('auth')->group(function(){
    Route::get('/admin/profile/{id}/','UserController@profile')->name('admin.profile');
    Route::get('/admin/polls/{id}/','UserController@polls')->name('admin.polls');
});

Auth::routes();

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
    return view('welcome');
});
Route::get('userf/login', function () {
    return 1;
});

Route::get('user/login','frontend\LoginController@showLoginForm')->name('user.login');
Route::get('user/regi','frontend\LoginController@showRegiForm')->name('user.regi');
Route::post('user/login','frontend\LoginController@login')->name('user.login.post');
Route::post('user/reg','frontend\LoginController@store')->name('user.reg.post');

Route::get('user/dashboard','frontend\UserController@index')->name('user.dash')->middleware('auth');
Route::post('user/logout','frontend\LoginController@logout')->name('user.logout')->middleware('auth');


Route::get('admin/login','backend\LoginController@showLoginForm')->name('admin.login');
Route::get('admin/regi','backend\LoginController@showRegiForm')->name('admin.regi');
Route::post('admin/login','backend\LoginController@login')->name('admin.login.post');
Route::post('admin/reg','backend\LoginController@store')->name('admin.reg.post');

Route::get('admin/dashboard','backend\AdminController@index')->name('admin.dash')->middleware('auth:admin');
Route::post('admin/logout','backend\LoginController@logout')->name('admin.logout')->middleware('auth:admin');

<?php

use App\User;
use Auth as Auth;
use App\WorkingHour;

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

Route::get('/', 'HomeController@index')->name('guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/super/home', 'SuperAdminController@index')->name('super.home');
Route::get('/super/dashboard', 'SuperAdminController@dashboard')->name('super.dash');
Route::get('/super/api_calls', 'SuperAdminController@api_calls')->name('super.api.calls');
Route::get('/super/edit/user/{id}', 'SuperAdminController@editUser')->name('super.edit.user');
Route::post('/super/edit/update/{id}', 'SuperAdminController@update_user')->name('super.update.user');
Route::get('/admin/home', 'AdminController@index')->name('admin.home');
Route::get('/admin/users', 'SuperAdminController@adminUsers')->name('admin.users');
Route::get('/admin/register', 'AdminController@register')->name('register.child.view');
Route::get('/admin/edit/{id}', 'AdminController@edit')->name('edit.child.view');
Route::get('/admin/registered', 'AdminController@registered')->name('registered.child.view');
Route::post('/admin/register/save', 'AdminController@saveRegisterForm')->name('register.child.save');
Route::post('/admin/update/{id}', 'AdminController@editRegisterForm')->name('register.child.edit');
Route::post('/super/api/call/{type}', 'SuperAdminController@apiCall')->name('api.call');
Route::post('/user/toogle/status/{id}', 'SuperAdminController@toogle_user_status');


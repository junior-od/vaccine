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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/super/dashboard', 'SuperAdminController@index')->name('super.dash');
Route::get('/admin/dashboard', 'AdminController@index')->name('admin.dash');
Route::get('/admin/register', 'AdminController@register')->name('register.child.view');
Route::get('/admin/vaccinated', 'AdminController@vaccinated')->name('vaccinated.child.view');
Route::post('/admin/register/save', 'AdminController@saveRegisterForm')->name('register.child.save');

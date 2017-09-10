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
Route::get('/super/home', 'SuperAdminController@index')->name('super.home');
Route::get('/super/dashboard', 'SuperAdminController@dashboard')->name('super.dash');
Route::get('/admin/home', 'AdminController@index')->name('admin.home');
Route::get('/admin/register', 'AdminController@register')->name('register.child.view');
Route::get('/admin/edit/{id}', 'AdminController@edit')->name('edit.child.view');
Route::get('/admin/registered', 'AdminController@vaccinated')->name('vaccinated.child.view');
Route::post('/admin/register/save', 'AdminController@saveRegisterForm')->name('register.child.save');
Route::post('/admin/update/{id}', 'AdminController@editRegisterForm')->name('register.child.edit');

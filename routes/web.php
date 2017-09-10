<?php

use App\User;
use Auth as Auth;

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
Route::get('/admin/registered', 'AdminController@registered')->name('registered.child.view');
Route::post('/admin/register/save', 'AdminController@saveRegisterForm')->name('register.child.save');
Route::post('/admin/update/{id}', 'AdminController@editRegisterForm')->name('register.child.edit');

Route::get('/insert', function () {

    User::where('id', Auth::id())
    ->update(['api_token' => 'y9ntVwhwC1wBulTzHMSIFwnLeiIFoybWAmhnivfqxP2BlNeLe7aLB59rJuOX']);

    dd('done');
});

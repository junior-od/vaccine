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


Route::get('/insert', function () {

    User::where('id', Auth::id())
    ->update(['api_token' => 'y9ntVwhwC1wBulTzHMSIFwnLeiIFoybWAmhnivfqxP2BlNeLe7aLB59rJuOX']);

    dd('done');
});

Route::get('/insert/worker', function (\Faker\Generator $faker) {


    for ($i = 0; $i <= 49; $user->id) {
          User::create([
              'first_name' => substr($faker->name, 0, strpos($faker->name, " ")),
              'last_name' => substr($faker->name, 0, strpos($faker->name, " ")),
              'email' => $faker->unique()->safeEmail,
              'telephone' => $faker->phoneNumber,
              'role_id' => 2,
              'password' => bcrypt('password'),
          ]);
    }

    dd('done');
});


Route::get('delete/last', function () {
    User::where('id', 52)
    ->delete();

    dd('done');
});

Route::get('working/hrs', function () {

    $users = User::where('role_id', 2)->get();

    $i = 0;
    foreach($users as $user) {

        if ($user->id <= 11) {
            WorkingHour::create([
              'user_id' => $user->id,
              'from' => '09:00:00',
              'to' => '11:00:00',
              'wage_per_hour' => 8,
            ]);
        } elseif ($user->id > 11 && $user->id <= 21) {
          WorkingHour::create([
            'user_id' => $user->id,
            'from' => '11:00:01',
            'to' => '13:00:00',
            'wage_per_hour' => 8,
          ]);
        } elseif ($user->id > 21 && $user->id <= 31) {
          WorkingHour::create([
            'user_id' => $user->id,
            'from' => '13:00:01',
            'to' => '15:00:00',
            'wage_per_hour' => 8,
          ]);
        } elseif ($user->id > 31 && $user->id <= 41) {
          WorkingHour::create([
            'user_id' => $user->id,
            'from' => '15:00:01',
            'to' => '17:00:00',
            'wage_per_hour' => 8,
          ]);
        } elseif ($user->id > 41 && $user->id <= 51) {
          WorkingHour::create([
            'user_id' => $user->id,
            'from' => '17:00:01',
            'to' => '19:00:00',
            'wage_per_hour' => 8,
          ]);
        }

    }

    dd('done');
});

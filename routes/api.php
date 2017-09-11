<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1'], function() {

    Route::group(['middleware' => 'auth:api'], function() {

      Route::post('registrations/status', 'Api\RestController@completion_status');
      Route::post('registrations/male', 'Api\RestController@registered_male');
      Route::post('registrations/female', 'Api\RestController@registered_female');
      Route::post('registrations/today', 'Api\RestController@total_registrations_today');
      Route::post('registrations/vaccine_given', 'Api\RestController@vaccinated_children');

    });

});

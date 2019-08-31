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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::group([
    'prefix' => 'collect',
], function () {
    Route::post('addProducer', 'collectController@addProducer');
    Route::post('addDelivery', 'collectController@addDelivery');
    Route::get('getGroup/{id}', 'collectController@getGroup');
    Route::post('makeRoute', 'collectController@makeRoute');
    Route::get('route', 'collectController@getRoute');
    Route::post('weighing', 'collectController@makeWeighing');
    Route::get('weighing', 'collectController@getWeighing');
    Route::post('addVehicle', 'collectController@addVehicle');
    Route::post('addDriver', 'collectController@addDriver');
    Route::post('makeGroup', 'collectController@makeGroup');
    Route::post('vehicleAssigment', 'collectController@vehicleAssigment');
});
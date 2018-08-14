<?php

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

use Illuminate\Http\JsonResponse;

Route::group([
    'prefix' => 'v1'
], function () {
    Route::get('jobs', 'JobController@index');
    Route::post('job', 'JobController@store');
    Route::get('job/{id}', 'JobController@edit');
    Route::put('job/{id}', 'JobController@update');
    Route::delete('job/{id}', 'JobController@delete');
});

Route::any('/', function () {
    return new JsonResponse([
        'message' => 'Request not found',
        'status' => 'not_found'
    ]);
});

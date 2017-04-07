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

Route::group(['middleware' => ['api:api', 'cors']], function () {

    /**
     * Common Routes.
     */
    Route::post('/login', [
        "as" => "api.login",
        "uses" => '\App\Api\V1\Controllers\CustomerController@doLogin'
    ]);

    Route::group(['middleware' => 'jwt-auth'], function () {

        /**
        * Logged In Routes.
        */
        
        Route::get('/logout', [
            "as" => "api.logout",
            "uses" => '\App\Api\V1\Controllers\CustomerController@logout'
        ]);
    });    
});

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});



/***
 * User requests
 */
Route::post('user', 'API\UserController@postCreateUser');
Route::get('user', 'API\UserController@getUserByEmail');
Route::get('user/{id}', 'API\UserController@getUserById');

/***
 * Manga requests
 */

Route::get('manga', 'API\MangaController@getManga');


/***
 * Follow requests
 */
Route::post('follow/{id}/update', 'API\FollowController@postUpdateFollow');
Route::get('follow/{id}/library', 'API\FollowController@getUserLibrary');

/***
 * Version requests
 */
Route::get('version/android', 'API\VersionController@getAndroidVersion');

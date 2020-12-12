<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

<<<<<<< HEAD
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('book', 'Api\BookController@index');
Route::post('book', 'Api\BookController@create');
Route::put('/book/{id}', 'Api\BookController@update');
Route::delete('/book/{id}', 'Api\BookController@delete');
=======
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route:: post('/register','AuthController@register');
Route:: post('/role','RoleController@create');
>>>>>>> 931191f4c3314712aa0e31098b64d61818a2bdbb

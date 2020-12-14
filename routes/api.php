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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/categorie','CategorieController@create');
Route::delete('/categorie/{id}','CategorieController@delete');

Route::post('/transaction','TransactionController@create');

Route::get('/book', 'Api\BookController@index');
Route::post('/book', 'Api\BookController@create');
Route::put('/book/{id}', 'Api\BookController@update');
Route::delete('/book/{id}', 'Api\BookController@delete');
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route:: post('/register','AuthController@register');
Route:: post('/login','AuthController@login');
Route:: post('/role','RoleController@create');

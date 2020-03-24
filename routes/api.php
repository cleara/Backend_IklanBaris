<?php

use Illuminate\Http\Request;

//tambahkan ini
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');


Route::middleware(['jwt.verify'])->group(function(){
	Route::get('/barang', 'BarangController@index');
	Route::get('/barang/{id}', 'BarangController@show');
	Route::post('/barang', 'BarangController@store');
	Route::put('/barang/{id}', 'BarangController@update');
	Route::delete('/barang/{id}', 'BarangController@destroy');


});
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

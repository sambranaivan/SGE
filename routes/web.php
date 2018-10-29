<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','EncuestaController@index');
Route::get('encuestas','EncuestaController@index');
Route::get('consultas','EncuestaController@listado');
Route::get('encuesta/{id}','EncuestaController@show');
Route::get('encuesta/detalle/{id}','EncuestaController@showDetalle');
Route::get('/enviar','ConsultaController@save');
Route::get('/confirmacion/{id}','ConsultaController@show');

Route::get('/nuevo',function(){
    return view('nuevaencuesta');
});

Route::post('/crear','EncuestaController@crear');
///lista de consultas
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// turismo branch
Route::get('turismo/eoh','eohController@index');
Route::post('turismo/eoh','eohController@save');
Route::get('turismo/eoh/confirmar/{id}',"eohController@confirmar");
Route::get('turismo/eoh/cancelar/{id}',"eohController@cancel");
Route::get('turismo/eoh/detalle','eohController@show');


//test
Route::get('getHotels/{id}','municipioController@getHotels');
Route::get('getHotel/{id}','hotelController@getHotel');
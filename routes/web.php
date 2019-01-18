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

Route::group(['middleware' => ['auth']], function () {
   // Only authenticated users may enter...

Route::get('turismo/admin',function(){
    return view('turismo.turismoadmin');
});
Route::get('turismo/cierre',"EohValueController@cierre");
Route::post('turismo/getreport',"EohValueController@getReport");

   //
Route::get('/','EncuestaController@index');
Route::get('encuestas','EncuestaController@index');
Route::get('consultas','EncuestaController@listado');
Route::get('encuesta/{id}','EncuestaController@show');
Route::get('encuesta/detalle/{id}','EncuestaController@showDetalle');
Route::get('/enviar','ConsultaController@save');
Route::get('/confirmacion/{id}','ConsultaController@show');

Route::get('/nuevo',function(){
    return view('nuevaencuesta');

    // PANEL DE ADMINISTRACIO
});

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

// turismo branch
Route::get('turismo/eoh','EohController@index');
Route::post('turismo/eoh','EohController@save');

Route::get('turismo/eoh/confirmar/{id}',"EohController@confirmar");
Route::get('turismo/eoh/cancelar/{id}',"EohController@cancel");
Route::get('turismo/eoh/detalle','EohController@show');
Route::post('turismo/eoh/detalle','EohController@showfilter');



//// Generar Reporte Administración
// Route::get('reporte','EohValueController@reporte');


Route::get('gestion/reporte','EohValueController@vistaReporte');


//Rutas de pobreza
Route::get('/pobreza',function(){
    return view('pobreza.pobreza');
});

Route::post('/reporte/post','PobrezaController@post');

Route::get('/pobreza/reporte','PobrezaController@reporte');

});
// ruta publica

Route::get('/turismo/reporte/{desde}/{hasta}/{user}','EohValueController@showReporte');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




//test
Route::get('getHotels/{id}','MunicipioController@getHotels');
Route::get('getHotel/{id}','HotelController@getHotel');



////generar reporte


Route::get('test/reservas','EohController@reporteReservas');



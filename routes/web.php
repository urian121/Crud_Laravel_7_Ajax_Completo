<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){
    return view('home.home');
})->name('home');


/**RUTA DE PROFESORES**/
Route::get('profe/', 'ProfesoresController@viewCreate')->name('vistaRegistrar');
Route::post('profe/add', 'ProfesoresController@dataProfe')->name('dataProfe');
Route::get('/Profesores', 'ProfesoresController@Profesores')->name('Profesores');
Route::get('detalle/{id}', 'ProfesoresController@detalleProfe')->name('detalleProfe');
Route::DELETE('delete/{id}', 'ProfesoresController@eliminarProfe')->name('eliminarProfe'); 

Route::get('actualizar/{id}', 'ProfesoresController@vistaUpdate')->name('actualizarProfe'); //vista para editar
Route::PUT('actua/{id}', 'ProfesoresController@updateProfesor')->name('updateProfe'); //Actualizando Informacion del Profe

Route::delete('/DeleteMultiple/', 'ProfesoresController@DeleteMultiple');


Route::get('boys/add', 'BoysController@viewBoy')->name('saveBoy');
Route::post('boys/save', 'BoysController@boyData')->name('boyData');

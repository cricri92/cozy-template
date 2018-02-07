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

Route::get('/', 'HomeController@index');
Route::get('propiedades', ['as' => 'lista-propiedades', 'uses' => 'PropertiesController@index']);
Route::get('propiedad/{prop_id}', ['as' => 'detalle-propiedad', 'uses' => 'PropertiesController@index']);


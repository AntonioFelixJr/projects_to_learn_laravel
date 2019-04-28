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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nome', 'MeuControlador@getNome');

Route::get('/idade', 'MeuControlador@getIdade');

Route::get('/multiplicar/{num1}/{num2}', 'MeuControlador@multiplicar');

Route::get('/pegarnome/{id}', 'MeuControlador@getNomeById')->where('id' ,'[0-9]+');

Route::resource('/cliente', 'ClienteControlador');
<?php

Route::prefix('/cliente')->group( function(){

	Route::get('/', 'ClienteController@index')->name('index.cliente');

	Route::get('/novo', 'ClienteController@create')->name('create.cliente');

	Route::post('/novo', 'ClienteController@store')->name('store.cliente');
	
});

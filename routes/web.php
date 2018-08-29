<?php

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin/products', 'ProductController@index'); //listar
	Route::get('/admin/products/create', 'ProductController@create'); //abrir form crear
	Route::post('/admin/products', 'ProductController@store'); //insertar

	Route::get('/admin/products/{id}/edit', 'ProductController@edit'); //abrir form editar
	Route::post('/admin/products/{id}/edit', 'ProductController@update');//editar

	Route::post('/admin/products/{id}/delete', 'ProductController@destroy'); //eliminar

	//imagenes
	Route::get('/admin/products/{id}/images', 'ImageController@index');//lista
	Route::post('/admin/products/{id}/images', 'ImageController@store'); //insertar
	Route::delete('/admin/products/{id}/images', 'ImageController@destroy'); //borrar
	Route::get('/admin/products/{id}/images/select/{image}', 'ImageController@select'); //destacar

});

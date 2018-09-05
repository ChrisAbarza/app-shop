<?php

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');

Route::get('/categories/{category}', 'CategoryController@show');


Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');

Route::post('/order', 'CartController@update');

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin/products', 'Admin\ProductController@index'); //listar
	Route::get('/admin/products/create', 'Admin\ProductController@create'); //abrir form crear
	Route::post('/admin/products', 'Admin\ProductController@store'); //insertar

	Route::get('/admin/products/{id}/edit', 'Admin\ProductController@edit'); //abrir form editar
	Route::post('/admin/products/{id}/edit', 'Admin\ProductController@update');//editar

	Route::post('/admin/products/{id}/delete', 'Admin\ProductController@destroy'); //eliminar

	//imagenes
	Route::get('/admin/products/{id}/images', 'Admin\ImageController@index');//lista
	Route::post('/admin/products/{id}/images', 'Admin\ImageController@store'); //insertar
	Route::delete('/admin/products/{id}/images', 'Admin\ImageController@destroy'); //borrar
	Route::get('/admin/products/{id}/images/select/{image}', 'Admin\ImageController@select'); //destacar

	//categorias
	Route::get('/admin/categories', 'Admin\CategoryController@index'); //listar
	Route::get('/admin/categories/create', 'Admin\CategoryController@create'); //abrir form crear
	Route::post('/admin/categories', 'Admin\CategoryController@store'); //insertar

	Route::get('/admin/categories/{category}/edit', 'Admin\CategoryController@edit'); //abrir form editar
	Route::post('/admin/categories/{category}/edit', 'Admin\CategoryController@update');//editar

	Route::post('/admin/categories/{category}/delete', 'Admin\CategoryController@destroy'); //eliminar

});

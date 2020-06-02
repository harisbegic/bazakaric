<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function() {
	Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
	
});

Route::resource('reports', 'ReportController');

Route::resource('tasks', 'TaskController');

Route::resource('childCategories', 'CategoryChildController')->middleware('can:manage-specifications');

Route::resource('parentCategories', 'CategoryParentController')->middleware('can:manage-specifications');

Route::resource('debljinaStjenke', 'DebljinaStjenkeController')->middleware('can:manage-specifications');

Route::resource('lokacija', 'LokacijaController')->middleware('can:manage-specifications');

Route::resource('materijal', 'MaterijalController')->middleware('can:manage-specifications');

Route::resource('promjer', 'PromjerController')->middleware('can:manage-specifications');

Route::resource('vrstaIzolacije', 'VrstaIzolacijeController')->middleware('can:manage-specifications');

Route::resource('duv', 'DuvController')->middleware('can:manage-specifications');

Route::resource('products', 'ProductController');



Route::get('products/{product}/addCategory', 'ProductController@addCategory')->name('products.addCategory')->middleware('can:edit-quantity');

Route::patch('updateCategory', 'ProductController@updateCategory')->name('products.updateCategory');

Route::get('products/{product}/alterKolicina', 'ProductController@alterKolicina')->name('products.alterKolicina')->middleware('can:edit-quantity');

Route::patch('updateKolicina', 'ProductController@updateKolicina')->name('products.updateKolicina');

Route::get('childCategories/{childCategory}/show', 'CategoryChildController@show')->name('childCategories.show');
<?php

use Illuminate\Support\Facades\Route;

Route::view('/','home');


Route::get('contact','ContactFormController@create');
Route::post('contact','ContactFormController@store');
Route::view('about','about');

Route::get('customer', 'CustomersController@index')->name('customer.index');
Route::get('customer/create', 'CustomersController@create')->name('customer.create');
Route::post('customer','CustomersController@store')->name('customer.store');
Route::get('customer/{customer}', 'CustomersController@show')->name('customer.show')->middleware('can:view,customer');
Route::get('customer/{customer}/edit', 'CustomersController@edit')->name('customer.edit');
Route::patch('customer/{customer}','CustomersController@update')->name('customer.update');
Route::delete('customer/{customer}', 'CustomersController@destroy')->name('customer.destroy');

//Route::resource('customer', 'CustomersController');



















Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

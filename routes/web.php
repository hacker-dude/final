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
Auth::routes();
Route::get('/', 'productsController@index')->name('index');
Route::get('/show/{id}',"productsController@show")->name('show');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', "productsController@create")->name('create')->middleware('check_admin');
Route::post('/admin/store', "productsController@store")->name('store')->middleware('check_admin');
Route::post('/admin/destroy',"productsController@destroy")->name('destroy')->middleware('check_admin');
Route::get('/edit/{id}',"productsController@edit")->name('edit')->middleware('check_admin'); 
Route::post('/update',"productsController@update")->name('update')->middleware('check_admin');
Route::post('/add_comment', 'productsController@add_comment')->name('addComment');
Route::post('/like', 'productsController@like')->name('like');

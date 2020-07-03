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

Route::redirect('/', '/book/list');

Route::redirect('/home', '/book/list');

Auth::routes();


Route::get('/import', function () {
  return view('import');
});

Route::get('/book/list', function () {
  return view('book.list');
});

Route::get('/book/data',function(){
	return App\Book::all();
});

Route::post('import/import-tsv', 'TsvImportController@store');
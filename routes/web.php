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

Route::redirect('/', '/home');

Route::get('/home', function () {
  return view('home');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
  // 認証処理後に表示させたいページ
  Route::get('/book/import', function () {
    return view('book.import');
  });
  
  Route::get('/book/list', function () {
    return view('book.list');
  });
  
  Route::get('/book/data',function(){
    return App\Book::all();
  });

  Route::post('/book/import/import-tsv', 'TsvImportController@store');
});




<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    //return redirect('/backend/login');
});

Route::get('/login', function() {
  return redirect('/backend/login');
});

Route::group(['prefix' => 'backend'], function(){
    Auth::routes();

    Route::group(['middleware' => ['auth']], function(){
        Route::get('/', 'BackendController@index')->name('backend');
        Route::resource('lojas', 'LojaController');
    });
});

Route::resource('operadors', 'OperadorController');
Route::resource('usuarios', 'UsuarioController');

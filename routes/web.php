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
    return view('selecao');
    //return redirect('/backend/login');
});

Route::get('/login', function() {
  return redirect('/backend/login');
});

Route::get('/login_usuario', function() {
    return redirect('backend/login_usuario');
});

Route::group(['prefix' => 'backend'], function(){
    Auth::routes();
    Route::resource('usuarios', 'UsuarioController');
    Route::get('/login_usuario', 'UsuarioController@loginForm');
    Route::group(['middleware' => ['auth']], function(){
        Route::get('/', 'BackendController@index')->name('backend');
        Route::resource('lojas', 'LojaController');
        Route::resource('operadores', 'OperadorController');

        Route::get('api/usuarios', 'UsuarioController@select')
            ->name('usuarios.select');
        Route::get('api/operadores', 'OperadorController@select')
            ->name('operadores.select');
        Route::post('operadores/changeStatus/{id}','OperadorController@changeStatus')->name('operadores.changestatus');
        Route::get('cartao/adicionarponto', 'CardController@showpontoform')->name('cartao.adicionarponto');
        Route::post('cartao/assinarponto', 'CardController@assinarponto')->name('cartao.assinarponto')->middleware('operador');

    });
});

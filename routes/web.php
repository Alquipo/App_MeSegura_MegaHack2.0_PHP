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

Route::get('/', function () {
    return view('index');
});


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::post('/user/register', 'UserController@register')->name('user.register');

Route::resource('categorias', 'CategoriaController');

Route::resource('receitas', 'ReceitaController');

Route::resource('despesas', 'DespesasController');

Route::get('enviarchat', 'ChatSendController@index');




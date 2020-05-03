<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/receberchat', 'ChatReceiverController@index');

Route::post('/chat-bot', 'ChatBotController@listenToReplies');

Route::get( '/lembrete-zapzap', 'API\ReminderWhatsAppController@index' );

Route::post('/bot', 'BotController@store')->name('bot.store');

Route::post('/user/register', 'UserController@register')->name('user.register');

Route::post('/receitas', 'BotController@storeReceita')->name('bot.store.receita');
Route::get('/receitas', 'BotController@listarReceitas')->name('bot.index.receita');

Route::post('/despesas', 'BotController@storeDespesa')->name('bot.store.despesa');
Route::get('/despesas', 'BotController@listarDespesas')->name('bot.index.despesa');

Route::get('/metas', 'BotController@listarMetas')->name('bot.index.meta');
Route::post('/metas', 'BotController@storeDespesas')->name('bot.store.despesa');

Route::get('/reconhecer', 'BotController@reconhecer');


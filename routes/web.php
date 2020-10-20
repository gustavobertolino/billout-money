<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::any('adminer', '\Aranyasen\LaravelAdminer\AdminerAutologinController@index');

Route::group([
    'prefix' => 'assets',
], function () {
    Route::get('/', 'AssetsController@index')
         ->name('assets.asset.index');
    Route::get('/create','AssetsController@create')
         ->name('assets.asset.create');
    Route::get('/show/{asset}','AssetsController@show')
         ->name('assets.asset.show')->where('id', '[0-9]+');
    Route::get('/{asset}/edit','AssetsController@edit')
         ->name('assets.asset.edit')->where('id', '[0-9]+');
    Route::post('/', 'AssetsController@store')
         ->name('assets.asset.store');
    Route::put('asset/{asset}', 'AssetsController@update')
         ->name('assets.asset.update')->where('id', '[0-9]+');
    Route::delete('/asset/{asset}','AssetsController@destroy')
         ->name('assets.asset.destroy')->where('id', '[0-9]+');
});

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

Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('getDashboard');
Route::get('dashboard', 'App\Http\Controllers\DashboardController@index')->name('getDashboard');

Route::group(['prefix' => 'master'], function () {
    Route::get('dataPeserta', 'App\Http\Controllers\Master\DataPesertaController@index')->name('getPeserta');
    Route::get('dataPeserta/json', 'App\Http\Controllers\Master\DataPesertaController@json')->name('getJsonPeserta');
    Route::get('dataPeserta/add', 'App\Http\Controllers\Master\DataPesertaController@add')->name('dataPeserta.add');
    Route::get('dataPeserta/updateRole/{id}', 'App\Http\Controllers\Master\DataPesertaController@updateRole')->name('dataPeserta.updateRole');
    Route::get('dataPeserta/getPesertaById/{id}', 'App\Http\Controllers\Master\DataPesertaController@getPesertaById')->name('dataPeserta.getPesertaById');
    Route::post('dataPeserta/updateData', 'App\Http\Controllers\Master\DataPesertaController@updateData')->name('dataPeserta.updateData');
    Route::get('dataPeserta/delete/{id}', 'App\Http\Controllers\Master\DataPesertaController@delete')->name('dataPeserta.delete');

    Route::get('dataPenguji', 'App\Http\Controllers\Master\DataPengujiController@index')->name('getPenguji');
    Route::get('dataPenguji/add', 'App\Http\Controllers\Master\DataPengujiController@add')->name('dataPenguji.add');
    Route::get('dataPenguji/getPengujiById/{id}', 'App\Http\Controllers\Master\DataPengujiController@getPengujiById')->name('dataPenguji.getPengujiById');
    Route::post('dataPenguji/updateData', 'App\Http\Controllers\Master\DataPengujiController@updateData')->name('dataPenguji.updateData');
    Route::get('dataPenguji/delete/{id}', 'App\Http\Controllers\Master\DataPengujiController@delete')->name('dataPenguji.delete');
    Route::get('dataPenguji/updateRole/{id}', 'App\Http\Controllers\Master\DataPengujiController@updateRole')->name('dataPenguji.updateRole');
});

Route::group(['prefix' => 'fit-proper'], function () {
    Route::get('pendaftaran', 'App\Http\Controllers\FitProper\FitProperController@pendaftaran')->name('fitProper.pendaftaran');
    Route::get('pendaftaran/getPegawaiById/{id}', 'App\Http\Controllers\FitProper\FitProperController@getPegawaiById')->name('fitProper.getPegawaiById');
    Route::get('pencarian', 'App\Http\Controllers\FitProper\FitProperController@pencarian')->name('fitProper.pencarian');
    Route::get('pencarian/pencarianById/{id}', 'App\Http\Controllers\FitProper\FitProperController@pencarianById')->name('fitProper.pencarianById');
    Route::post('tambah', 'App\Http\Controllers\FitProper\FitProperController@tambah')->name('fitProper.tambah');
});
<?php

use App\Http\Controllers\C_Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_Home;
use App\Http\Controllers\C_Login;
use App\Http\Controllers\C_Mahasiswa;

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

Route::get('home', [C_Home::class,'index']);
Route::get('/login', [C_Login::class,'login']);
Route::get('/dashboard', [C_Dashboard::class,'dashboard']);
Route::get('/mahasiswa', [C_Mahasiswa::class,'mahasiswa']);
Route::get('/mahasiswa/getData', [C_Mahasiswa::class,'getData']);
Route::get('/mahasiswa/getData/{id}', [C_Mahasiswa::class,'getOne']);
Route::post('/mahasiswa/add', [C_Mahasiswa::class,'add']);
Route::put('/mahasiswa/update/{id}', [C_Mahasiswa::class,'update']);
Route::delete('/mahasiswa/delete/{id}', [C_Mahasiswa::class,'destroy']);
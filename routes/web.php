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

Route::get('/home', 'SuratController@showAll');

Route::get('/about', function () {
    return view('profil');
});

Route::get('/surat/{id}', 'SuratController@showDetail');

Route::post('/delete/{id}', 'SuratController@deleteFile');

Route::get('/newData', function () {
    return view('form');
});

Route::post('/newData', 'SuratController@uploadFile');


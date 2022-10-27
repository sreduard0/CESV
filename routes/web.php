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
    return view('home-gda-adj');
})->middleware('auth');
Route::get('/gestor', function () {
    return view('home-gest');
})->middleware('auth');
Route::get('/vtr', function () {
    return view('vtr-list');
})->middleware('auth');

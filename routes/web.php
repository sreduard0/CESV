<?php

use App\Http\Controllers\MissionController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\VtrController;
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
// VIEWS
Route::get('/', [ViewController::class, 'home'])->name('home')->middleware('auth');



// AÇÕES
Route::get('get_info_vtr/{id}',[VtrController::class, 'get_info_vtr'])->name('get_info_vtr')->middleware('auth');
Route::get('info_mission/{id}',[MissionController::class, 'infoMission'])->name('info_mission')->middleware('auth');

Route::post('post_missions_list',[MissionController::class,'missionList'])->name('post_missions_list')->middleware('auth');

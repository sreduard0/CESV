<?php

use App\Http\Controllers\FichaController;
use App\Http\Controllers\GdaController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\VtrController;
use Illuminate\Support\Facades\Route;

// VIEWS
Route::get('/', [ViewController::class, 'home'])->name('home')->middleware('auth');
Route::get('/fichas', [ViewController::class, 'fichas'])->name('fichas')->middleware('auth');
Route::get('/vtr', [ViewController::class, 'viatura'])->name('vtr')->middleware('auth');
Route::get('/motoristas', [ViewController::class, 'drivers'])->name('drivers')->middleware('auth');

// AÇÕES --------------------------------------------------------------------

// VIATURAS
Route::get('get_info_vtr/{id}', [VtrController::class, 'get_info_vtr'])->name('get_info_vtr')->middleware('auth');
Route::post('post_vtr_list', [VtrController::class, 'listVtr'])->name('listVtr')->middleware('auth');

// MISSÕES
Route::get('info_mission/{id}', [MissionController::class, 'infoMission'])->name('info_mission')->middleware('auth');
Route::get('alt_sts_mission/{id}', [MissionController::class, 'altStsMission'])->middleware('auth');
Route::get('finish_mission/{id}', [MissionController::class, 'finishMission'])->middleware('auth');
Route::post('post_missions_list', [MissionController::class, 'listMission'])->name('post_missions_list')->middleware('auth');

// FICHAS
Route::get('get_info_ficha/{id}', [FichaController::class, 'infoFicha'])->name('infoFicha')->middleware('auth');
Route::post('post_fichas_list', [FichaController::class, 'listFichas'])->name('post_fichas_list')->middleware('auth');
Route::post('fichas_layout', [FichaController::class, 'fichasLayout'])->name('fichas_layout')->middleware('auth');

// RELA GUARDA
Route::get('countRelGda', [GdaController::class, 'countRelGda'])->middleware('auth');
Route::get('deleterelgda/{id}', [GdaController::class, 'deleteRelGda'])->middleware('auth');
Route::get('get_info_register/{id}', [GdaController::class, 'infoRegister'])->middleware('auth');
Route::get('get_info_relgda/{ebplaca}', [GdaController::class, 'infoRelGda'])->middleware('auth');
Route::post('post_relgda_list', [GdaController::class, 'listRelGda'])->name('post_relgda_list')->middleware('auth');

// FIM ACÕES ----------------------------------------------------------------

//CRUD ----------------------------------------------------------------------

// MISSÕES
Route::post('register_mission', [MissionController::class, 'registerMission'])->middleware('auth');
Route::post('edit_mission', [MissionController::class, 'editMission'])->middleware('auth');
Route::get('delete_mission/{id}', [MissionController::class, 'deleteMission'])->middleware('auth');

// VIATURAS
Route::post('register_vtr', [VtrController::class, 'registerVtr'])->middleware('auth');
Route::post('edit_vtr', [VtrController::class, 'editVtr'])->middleware('auth');
Route::get('delete_vtr/{id}', [VtrController::class, 'deleteVtr'])->middleware('auth');

// FICHAS
Route::post('register_ficha', [FichaController::class, 'registerFicha'])->middleware('auth');
Route::post('edit_ficha', [FichaController::class, 'editFicha'])->middleware('auth');
Route::get('finish_ficha/{id}', [FichaController::class, 'finishFicha'])->middleware('auth');

// RELA GDA
Route::post('register_relgda', [GdaController::class, 'registerRelGda'])->middleware('auth');
Route::post('close_relgda', [GdaController::class, 'closeRelGda'])->middleware('auth');

// FIM CERUD ------------------------------------------------------------------

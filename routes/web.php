<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\GdaController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\MotController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\VtrController;
use Illuminate\Support\Facades\Route;

// LOGIN
Route::get('/login', [ViewController::class, 'login'])->name('login');
Route::post('submit_login', [AdminController::class, 'loginSubmit'])->name('loginSubmit');
Route::get('loginSistao', [AdminController::class, 'loginSistao'])->name('loginSistao');
Route::get('logout', function () {
    session()->flush();
    return redirect()->route('login');
})->name('logout');

Route::middleware('auth')->group(function () {
// VIEWS
    Route::get('/', [ViewController::class, 'home'])->name('home');
    Route::get('/fichas', [ViewController::class, 'fichas'])->name('fichas')->middleware('role:trnp');
    Route::get('/vtr', [ViewController::class, 'viatura'])->name('vtr')->middleware('role:trnp');
    Route::get('/motoristas', [ViewController::class, 'drivers'])->name('drivers')->middleware('role:trnp>adm');
    Route::get('/relatorio', [ViewController::class, 'reports'])->name('reports')->middleware('role:adj>cmtgda>adm');
    Route::get('/missoes', [ViewController::class, 'missions'])->name('missions')->middleware('role:trnp>cost>fiscadm');
    Route::get('/usuarios', [ViewController::class, 'users'])->name('users')->middleware('role:adm');

// AÇÕES --------------------------------------------------------------------

// VIATURAS
    Route::get('get_info_vtr/{id}', [VtrController::class, 'get_info_vtr'])->name('get_info_vtr')->middleware('role:trnp>adm');
    Route::post('post_vtr_list', [VtrController::class, 'listVtr'])->name('listVtr')->middleware('role:trnp>adm');

// MISSÕES
    Route::get('info_mission/{id}', [MissionController::class, 'infoMission'])->name('info_mission')->middleware('role:cost>fiscadm>trnp>adm');
    Route::get('alt_sts_mission/{id}', [MissionController::class, 'altStsMission'])->middleware('role:trnp');
    Route::get('finish_mission/{id}', [MissionController::class, 'finishMission'])->middleware('role:trnp');
    Route::post('post_missions_list', [MissionController::class, 'listMission'])->name('post_missions_list')->middleware('role:cost>fiscadm>trnp>adm');

// FICHAS
    Route::get('get_info_ficha/{id}', [FichaController::class, 'infoFicha'])->name('infoFicha')->middleware('role:cmtgda>adj>trnp');
    Route::post('post_fichas_list', [FichaController::class, 'listFichas'])->name('post_fichas_list')->middleware('role:trnp>adm');
    Route::post('fichas_layout', [FichaController::class, 'fichasLayout'])->name('fichas_layout')->middleware('role:adj>cmtgda');

// RELA GUARDA
    Route::get('countRelGda', [GdaController::class, 'countRelGda'])->middleware('role:adj>trnp>cmtgda');
    Route::get('get_info_register/{id}', [GdaController::class, 'infoRegister'])->middleware('role:adj>cmtgda>adm');
    Route::get('get_info_relgda/{ebplaca}', [GdaController::class, 'infoRelGda'])->middleware('role:adj>cmtgda');
    Route::post('post_relgda_list', [GdaController::class, 'listRelGda'])->name('post_relgda_list')->middleware('role:adm>cmtgda>adj');
    Route::post('report_relgda_list', [GdaController::class, 'reportRelGda'])->name('report_relgda_list')->middleware('role:adm>cmtgda>adj');

// LISTA DE MOTORISTA
    Route::post('post_mot_list', [MotController::class, 'listMot'])->name('post_mot_list')->middleware('role:trnp>adm');
    Route::get('get_info_mot/{id}', [MotController::class, 'infoMot'])->middleware('role:trnp>adm');

// ADMINISTRADOR
    Route::get('getGraphicMissionsOp', [AdminController::class, 'getGraphicMissionsOp'])->name('getGraphicMissionsOp')->middleware('role:adm');
    Route::get('getGraphicMissionsOmOp', [AdminController::class, 'getGraphicMissionsOmOp'])->name('getGraphicMissionsOmOp')->middleware('role:adm');
    Route::get('getGraphicRelGda', [AdminController::class, 'getGraphicRelGda'])->name('getGraphicRelGda')->middleware('role:adm');
    Route::post('post_rank_vtr', [AdminController::class, 'rankVtr'])->name('rankVtr')->middleware('role:adm');
    Route::post('post_users_list', [AdminController::class, 'listUsers'])->name('listUsers')->middleware('role:adm');
    Route::get('/alt_permission_user/{iduser}/{profile?}/{id?}', [AdminController::class, 'userPerm'])->middleware('role:adm');

// FIM ACÕES ----------------------------------------------------------------

//CRUD ----------------------------------------------------------------------

// MISSÕES
    Route::post('register_mission', [MissionController::class, 'registerMission'])->middleware('role:cost>fiscadm');
    Route::post('edit_mission', [MissionController::class, 'editMission'])->middleware('role:cost>fiscadm');
    Route::get('delete_mission/{id}', [MissionController::class, 'deleteMission'])->middleware('role:cost>fiscadm');

// VIATURAS
    Route::post('register_vtr', [VtrController::class, 'registerVtr'])->middleware('role:trnp');
    Route::post('edit_vtr', [VtrController::class, 'editVtr'])->middleware('role:trnp');
    Route::get('delete_vtr/{id}', [VtrController::class, 'deleteVtr'])->middleware('role:trnp');

// FICHAS
    Route::post('register_ficha', [FichaController::class, 'registerFicha'])->middleware('role:trnp');
    Route::post('edit_ficha', [FichaController::class, 'editFicha'])->middleware('role:trnp');
    Route::get('finish_ficha/{id}', [FichaController::class, 'finishFicha'])->middleware('role:trnp');

// RELA GDA
    Route::post('register_relgda', [GdaController::class, 'registerRelGda'])->middleware('role:adj>cmtgda');
    Route::post('edit_relgda', [GdaController::class, 'editRelGda'])->middleware('role:adj');
    Route::post('close_relgda', [GdaController::class, 'closeRelGda'])->middleware('role:adj>cmtgda');
    Route::get('deleterelgda/{id}', [GdaController::class, 'deleteRelGda'])->middleware('role:adj');

// MOTORISTA
    Route::post('register_mot', [MotController::class, 'registerMot'])->middleware('role:trnp');
    Route::post('edit_mot', [MotController::class, 'editMot'])->middleware('role:trnp');
    Route::get('delete_mot/{id}', [MotController::class, 'deleteMot'])->middleware('role:trnp');

// FIM CERUD ------------------------------------------------------------------
});

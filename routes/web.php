<?php

use App\Http\Controllers\FichaController;
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

Route::get('/inicio/{id}', function ($id) {
    if ($id == 1) {
        session()->put([
            'CESV' => [
                'profileType' => 1,
                'notification' => 1,
                'loginID' => 1,
            ],

            'user' => [
                'id' => 1,
                'name' => 'Eduardo Martins',
                'photo' => 'img/viatura.jpg',
                'professionalName' => 'Eduardo',
                'email' => 'dudu.martins373@gmail.com',
                'rank' => 'Cb',
                'company' => [
                    'id' => 2,
                    'name' => 'CCSv',
                ],
            ],

            'theme' => 1,
        ]);

    } else {
        session()->put([
            'CESV' => [
                'profileType' => 1,
                'notification' => 1,
                'loginID' => 1,
            ],

            'user' => [
                'id' => 1,
                'name' => 'Eduardo Martins',
                'photo' => 'img/viatura.jpg',
                'professionalName' => 'Eduardo',
                'email' => 'dudu.martins373@gmail.com',
                'rank' => 'Cb',
                'company' => [
                    'id' => 2,
                    'name' => 'CCSv',
                ],
            ],

            'theme' => 1,
        ]);
    }

    echo '<a href="/inicio/1">TRNP</a><br>';
    echo '<a href="/inicio/2">GDA</a>';
});
// VIEWS
Route::get('/', [ViewController::class, 'home'])->name('home')->middleware('auth');
Route::get('/fichas', [ViewController::class, 'fichas'])->name('fichas')->middleware('auth');
Route::get('/vtr', [ViewController::class, 'viatura'])->name('vtr')->middleware('auth');

// AÇÕES --------------------------------------------------------------------

// VIATURAS
Route::get('get_info_vtr/{id}', [VtrController::class, 'get_info_vtr'])->name('get_info_vtr')->middleware('auth');
Route::post('post_vtr_list', [VtrController::class, 'listVtr'])->name('listVtr')->middleware('auth');
// MISSÕES
Route::get('info_mission/{id}', [MissionController::class, 'infoMission'])->name('info_mission')->middleware('auth');
Route::get('finish_mission/{id}', [MissionController::class, 'finishMission'])->middleware('auth');
Route::post('post_missions_list', [MissionController::class, 'listMission'])->name('post_missions_list')->middleware('auth');
// FICHAS
Route::get('get_info_ficha/{id}', [FichaController::class, 'infoFicha'])->name('infoFicha')->middleware('auth');
Route::post('post_fichas_list', [FichaController::class, 'listFichas'])->name('post_fichas_list')->middleware('auth');
Route::post('fichas_layout', [FichaController::class, 'fichasLayout'])->name('fichas_layout')->middleware('auth');

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

// FIM CERUD ------------------------------------------------------------------

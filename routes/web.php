<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChooseUserController;
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

Route::get('/', function()
{
    return redirect('choose_user');
});

Route::get('/choose_user', [ChooseUserController::class, 'index']);
Route::get('/login_admin', [AdminController::class, 'login']);

Route::prefix('admin')->group(function() {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/dashboard/dosen', [AdminController::class, 'dosen']);
    Route::get('/dashboard/dosen/input', [AdminController::class, 'inputDosen']);
    Route::get('/dashboard/dosen/update', [AdminController::class, 'updateDosen']);
    Route::get('/dashboard/kelas', [AdminController::class, 'kelas']);
    Route::get('/dashboard/kelas/input', [AdminController::class, 'inputKelas']);
    Route::get('/dashboard/kelas/update', [AdminController::class, 'updateKelas']);
    Route::get('/dashboard/mahasiswa', [AdminController::class, 'mahasiswa']);
    Route::get('/dashboard/mahasiswa/input', [AdminController::class, 'inputMahasiswa']);
    Route::get('/dashboard/mahasiswa/update', [AdminController::class, 'updateMahasiswa']);
});


// api
Route::prefix('api')->group(function(){
    Route::prefix('get')->group(function() {
        Route::prefix('dosen')->group(function() {
            Route::get('/all', [App\Http\Controllers\ApiDosenController::class, 'getAllDosen']);
            Route::get('/for_data_kelas', [App\Http\Controllers\ApiDosenController::class, 'getDosenForDataKelasPage']);
            Route::get('/count', [App\Http\Controllers\ApiDosenController::class, 'getDosenCount']);
        });
        Route::prefix('kelas')->group(function() {
            Route::get('/all', [App\Http\Controllers\ApiKelasController::class, 'getAllKelas']);
            Route::get('/count', [App\Http\Controllers\ApiKelasController::class, 'getKelasCount']);
            Route::get('/data_kelas_page', [App\Http\Controllers\api\KelasController::class, 'getDataForKelasDataPage']);
        });
        Route::prefix('mahasiswa')->group(function() {
            Route::get('/count', [App\Http\Controllers\ApiMahasiswaController::class, 'getMahasiswaCount']);
        });
        Route::prefix('admin')->group(function() {
            Route::get('/check_login', [App\Http\Controllers\ApiAdminController::class, 'getCheckLoginAdmin']);
        });
        Route::prefix('generation')->group(function() {
            Route::get('/for_data_kelas', [App\Http\Controllers\api\GenerationController::class, 'getGenerationFordataKelasPage']);
        });
    });

    Route::prefix('post')->group(function() {
        Route::prefix('dosen')->group(function(){
            Route::get('store', [App\Http\Controllers\ApiDosenController::class, 'storeDosen']);
            Route::get('edit', [App\Http\Controllers\ApiDosenController::class, 'editDosen']);
            Route::get('delete', [App\Http\Controllers\ApiDosenController::class, 'deleteDosen']);
        });
    });
});

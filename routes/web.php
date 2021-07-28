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
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
Route::get('/admin/dashboard/dosen', [AdminController::class, 'dosen']);
Route::get('/admin/dashboard/dosen/input', [AdminController::class, 'inputDosen']);
Route::get('/admin/dashboard/dosen/update', [AdminController::class, 'updateDosen']);
Route::get('/admin/dashboard/kelas', [AdminController::class, 'kelas']);
Route::get('/admin/dashboard/kelas/input', [AdminController::class, 'inputKelas']);
Route::get('/admin/dashboard/kelas/update', [AdminController::class, 'updateKelas']);
Route::get('/admin/dashboard/mahasiswa', [AdminController::class, 'mahasiswa']);
Route::get('/admin/dashboard/mahasiswa/input', [AdminController::class, 'inputMahasiswa']);
Route::get('/admin/dashboard/mahasiswa/update', [AdminController::class, 'updateMahasiswa']);


// api
Route::prefix('get')->group(function () {
    Route::get('/get_all_admin', [App\Http\Controllers\ApiAdminController::class, 'getAllAdmin']);
    Route::get('/get_all_dosen', [App\Http\Controllers\ApiDosenController::class, 'getAllDosen']);
    Route::get('/dosen_count', [App\Http\Controllers\ApiDosenController::class, 'getDosenCount']);
    Route::get('/kelas_count', [App\Http\Controllers\ApiKelasController::class, 'getKelasCount']);
    Route::get('/mahasiswa_count', [App\Http\Controllers\ApiMahasiswaController::class, 'getMahasiswaCount']);
    Route::get('/check_login_admin', [App\Http\Controllers\ApiAdminController::class, 'getCheckLoginAdmin']);
});

Route::prefix('post')->group(function() {
    Route::get('/store_dosen', [App\Http\Controllers\ApiDosenController::class, 'storeDosen']);
    Route::get('/edit_dosen', [App\Http\Controllers\ApiDosenController::class, 'editDosen']);
    Route::get('/delete_dosen', [App\Http\Controllers\ApiDosenController::class, 'deleteDosen']);
});

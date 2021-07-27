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
Route::get('/admin/dashboard/dosen/input', [AdminController::class, 'storeDosen']);
Route::get('/admin/dashboard/dosen/edit', [AdminController::class, 'editDosen']);
Route::get('/admin/dashboard/kelas', [AdminController::class, 'kelas']);
Route::get('/admin/dashboard/kelas/input', [AdminController::class, 'storeKelas']);
Route::get('/admin/dashboard/kelas/edit', [AdminController::class, 'editKelas']);


// api
Route::get('/get_all_admin', [AdminController::class, 'getAllAdmin']);
Route::get('/check_login_admin', [AdminController::class, 'getCheckLoginAdmin']);

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

Route::get('/beranda', [App\Http\Controllers\dosen\HomeController::class, 'index']);
Route::get('/form1', [App\Http\Controllers\dosen\FormController::class, 'form1']);
Route::get('/form2', [App\Http\Controllers\dosen\FormController::class, 'form2']);
Route::get('/form3', [App\Http\Controllers\dosen\FormController::class, 'form3']);

Route::middleware(['IsAdminNotLogin'])->group(function() {
    Route::get('/choose_user', [ChooseUserController::class, 'index']);
    Route::get('/edit_password', [App\Http\Controllers\AdminController::class, 'editPassword']);
    Route::get('/login_admin', [AdminController::class, 'login'])->name('login_admin');
});

Route::prefix('admin')->middleware(['IsAdminLogin'])->group(function() {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard_admin');
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
            Route::get('/all', [App\Http\Controllers\api\DosenController::class, 'getAllDosen']);
            Route::get('/for_data_kelas', [App\Http\Controllers\api\DosenController::class, 'getDosenForDataKelasPage']);
            Route::get('/for_data_dosen', [App\Http\Controllers\api\DosenController::class, 'getDosenForDataDosenPage']);
            Route::get('/count', [App\Http\Controllers\api\DosenController::class, 'getDosenCount']);
            Route::get('/for_input_kelas', [App\Http\Controllers\api\DosenController::class, 'getDosenForInputClassPage']);
            Route::get('/for_form', [App\Http\Controllers\api\DosenController::class, 'getDosenForFormPage']);
        });
        Route::prefix('kelas')->group(function() {
            Route::get('/all', [App\Http\Controllers\api\KelasController::class, 'getAllKelas']);
            Route::get('/count', [App\Http\Controllers\api\KelasController::class, 'getKelasCount']);
            Route::get('/data_kelas_page', [App\Http\Controllers\api\KelasController::class, 'getDataForKelasDataPage']);
            Route::get('/input_mahasiswa_page', [App\Http\Controllers\api\KelasController::class, 'getDataForInputMahasiswaPage']);
            Route::get('/by_homeroomid', [App\Http\Controllers\api\KelasController::class, 'getKelasByLecturerId']);
            Route::get('/get_generation_id', [App\Http\Controllers\api\KelasController::class, 'getGenerationId']);
        });
        Route::prefix('mahasiswa')->group(function() {
            Route::get('/count', [App\Http\Controllers\api\MahasiswaController::class, 'getMahasiswaCount']);
            Route::get('/data_mahasiswa_page', [App\Http\Controllers\api\MahasiswaController::class, 'getDataForDataMahasiswaPage']);
            Route::get('/for_form_page', [App\Http\Controllers\api\MahasiswaController::class, 'getMahasiswaForFormPage']);
        });
        Route::prefix('admin')->group(function() {
            Route::get('/check_login', [App\Http\Controllers\api\AdminController::class, 'getCheckLoginAdmin']);
            Route::get('/is_password_true', [App\Http\Controllers\api\AdminController::class, 'isPasswordTrue']);
        });
        Route::prefix('generation')->group(function() {
            Route::get('/for_data_kelas', [App\Http\Controllers\api\GenerationController::class, 'getGenerationFordataKelasPage']);
            Route::get('/for_input_kelas', [App\Http\Controllers\api\GenerationController::class, 'getGenerationForInputClassPage']);
        });
        Route::prefix('school_year')->group(function(){
            Route::get('/all', [App\Http\Controllers\api\SchoolYearController::class, 'getAllSchoolYear']);
        });
        Route::prefix('question')->group(function() {
            Route::get('form', [App\Http\Controllers\api\SubFormController::class, 'getFormQuestion']);
        });
    });

    Route::prefix('post')->group(function() {
        Route::prefix('dosen')->group(function(){
            Route::get('store', [App\Http\Controllers\api\DosenController::class, 'storeDosen']);
            Route::get('edit', [App\Http\Controllers\api\DosenController::class, 'editDosen']);
            Route::get('delete', [App\Http\Controllers\api\DosenController::class, 'deleteDosen']);
        });
        Route::prefix('kelas')->group(function(){
            Route::get('store', [App\Http\Controllers\api\KelasController::class, 'storeKelas']);
            Route::get('edit', [App\Http\Controllers\api\KelasController::class, 'editKelas']);
            Route::get('delete', [App\Http\Controllers\api\KelasController::class, 'deleteKelas']);
        });
        Route::prefix('mahasiswa')->group(function(){
            Route::get('store', [App\Http\Controllers\api\MahasiswaController::class, 'storeMahasiswa']);
            Route::get('edit', [App\Http\Controllers\api\MahasiswaController::class, 'editMahasiswa']);
            Route::get('delete', [App\Http\Controllers\api\MahasiswaController::class, 'deleteMahasiswa']);
        });
        Route::prefix('admin')->group(function(){
            Route::get('logout', [App\Http\Controllers\api\AdminController::class, 'logout']);
            Route::post('change_password', [App\Http\Controllers\api\AdminController::class, 'changePassword']);
        });
        Route::prefix('form')->group(function(){
            Route::post("fill", [App\Http\Controllers\api\FillController::class, 'fill']);
        });
    });
});

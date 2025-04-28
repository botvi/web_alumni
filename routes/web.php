<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\admin\{
    DashboardController,
    MasterFakultasController,
    MasterProdiController,
    DaftarLowonganPekerjaanController,
    DaftarWisudaController,
    TracerStudiUniksController,
};
use App\Http\Controllers\web\{
    WebController,
    AboutController,
    LowonganKerjaController,
    LengkapiDataController,
};
use App\Http\Controllers\{
    LoginController,
};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/  


Route::get('/run-admin', function () {
    Artisan::call('db:seed', [
        '--class' => 'SuperAdminSeeder'
    ]);

    return "AdminSeeder has been create successfully!";
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/master_fakultas', MasterFakultasController::class);
    Route::resource('/master_prodi', MasterProdiController::class);
    Route::resource('/master_lowongan', DaftarLowonganPekerjaanController::class);
    Route::resource('/daftar_wisuda', DaftarWisudaController::class);
    Route::get('/daftar_wisuda/getProgramStudi/{fakultas_kode}', [DaftarWisudaController::class, 'getProgramStudi'])->name('daftar_wisuda.getProgramStudi');
    Route::resource('/tracer_studi_uniks', TracerStudiUniksController::class);
});


Route::get('/', [WebController::class, 'index'])->name('web.index');
Route::get('/lowongan-kerja', [LowonganKerjaController::class, 'index'])->name('lowongan-kerja.index');
Route::get('/tentang', [AboutController::class, 'index'])->name('tentang.index');

Route::post('/verifikasi', [LengkapiDataController::class, 'verifikasi'])->name('verifikasi.index');
Route::get('/lengkapi-data/{pin_akses}/{npm}', [LengkapiDataController::class, 'lengkapidata'])->name('lengkapi-data.index');
Route::post('/lengkapi-data', [LengkapiDataController::class, 'simpan'])->name('lengkapi-data.simpan');
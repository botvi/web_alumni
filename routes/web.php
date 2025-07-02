<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\admin\{
    DashboardController,
    MasterFakultasController,
    MasterProdiController,
    DaftarLowonganPekerjaanController,
    DataAlumniController,
    DataPekerjaanAlumniController,
    LaporanController,
    ProfilAdminController,
    KegiatanAlumniController,
    SaranAlumniController,
};
use App\Http\Controllers\web\{
    WebController,
    AboutController,
    LowonganKerjaController,
    LengkapiDataController,
    DaftarKegiatanAlumniController,
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

    Route::resource('/data_alumni', DataAlumniController::class);
    Route::resource('/data_pekerjaan_alumni', DataPekerjaanAlumniController::class);
    Route::get('/data_alumni/getProgramStudi/{fakultas_kode}', [DataAlumniController::class, 'getProgramStudi'])->name('data_alumni.getProgramStudi');
    
    Route::resource('/kegiatan_alumni', KegiatanAlumniController::class);

    Route::resource('/saran_alumni', SaranAlumniController::class);
    Route::post('/saran_alumni/berikan_respon/{id}', [SaranAlumniController::class, 'berikanRespon'])->name('saran_alumni.berikan_respon');

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::post('/laporan', [LaporanController::class, 'update'])->name('laporan.update');
    Route::get('/laporan/printdataalumni', [LaporanController::class, 'printdataalumni'])->name('laporan.printdataalumni');
    Route::get('/laporan/printdataalumniyangbekerja', [LaporanController::class, 'printdataalumniyangbekerja'])->name('laporan.printdataalumniyangbekerja');
    Route::get('/laporan/printdataalumniyangtidakbekerja', [LaporanController::class, 'printdataalumniyangtidakbekerja'])->name('laporan.printdataalumniyangtidakbekerja');
    Route::get('/laporan/printdataalumniyangwirausaha', [LaporanController::class, 'printdataalumniyangwirausaha'])->name('laporan.printdataalumniyangwirausaha');
  

    Route::get('/laporan/downloaddataalumni', [LaporanController::class, 'downloaddataalumni'])->name('laporan.downloaddataalumni');
    Route::get('/laporan/downloaddataalumniyangbekerja', [LaporanController::class, 'downloaddataalumniyangbekerja'])->name('laporan.downloaddataalumniyangbekerja');
    Route::get('/laporan/downloaddataalumniyangtidakbekerja', [LaporanController::class, 'downloaddataalumniyangtidakbekerja'])->name('laporan.downloaddataalumniyangtidakbekerja');
    Route::get('/laporan/downloaddataalumniyangwirausaha', [LaporanController::class, 'downloaddataalumniyangwirausaha'])->name('laporan.downloaddataalumniyangwirausaha');

    Route::get('/profil-admin', [ProfilAdminController::class, 'index'])->name('profil-admin.index');
    Route::put('/profil-admin', [ProfilAdminController::class, 'update'])->name('profil-admin.update');
});


Route::get('/', [WebController::class, 'index'])->name('web.index');
Route::get('/lowongan-kerja', [LowonganKerjaController::class, 'index'])->name('lowongan-kerja.index');
Route::get('/tentang', [AboutController::class, 'index'])->name('tentang.index');
Route::get('/daftar-kegiatan-alumni', [DaftarKegiatanAlumniController::class, 'index'])->name('daftar-kegiatan-alumni.index');

Route::post('/verifikasi', [LengkapiDataController::class, 'verifikasi'])->name('verifikasi.index');
Route::get('/lengkapi-data/{pin_akses}/{npm}', [LengkapiDataController::class, 'lengkapidata'])->name('lengkapi-data.index');
Route::post('/lengkapi-data', [LengkapiDataController::class, 'simpan'])->name('lengkapi-data.simpan');
Route::post('/lengkapi-data/saran', [LengkapiDataController::class, 'saran'])->name('lengkapi-data.saran');
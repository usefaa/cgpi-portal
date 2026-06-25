<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\RegulasiController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\KontakSettingController; // <- Import Controller Kontak Baru

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminBeritaController;
use App\Http\Controllers\Admin\AdminRegulasiController;
use App\Http\Controllers\Admin\AdminPendaftaranController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::redirect('/', '/cgpi/informasi');

Route::get('/cgpi/informasi', function () {
    return view('cgpi.informasi');
})->name('cgpi.informasi');

Route::get(
    '/cgpi/pendaftaran',
    [PendaftaranController::class, 'index']
)->name('cgpi.pendaftaran');

Route::get('/cgpi/kuesioner', function () {
    return view('cgpi.kuesioner');
})->name('cgpi.kuesioner');

Route::get(
    '/berita',
    [BeritaController::class, 'index']
)->name('berita.index');

Route::get(
    '/berita/{slug}',
    [BeritaController::class, 'show']
)->name('berita.show');

Route::get(
    '/regulasi',
    [RegulasiController::class, 'index']
)->name('regulasi.index');

Route::view(
    '/layanan',
    'layanan.index'
)->name('layanan.index');

Route::view(
    '/tentang-kami',
    'tentang-kami.index'
)->name('tentang.index');

Route::get(
    '/kontak',
    [KontakSettingController::class, 'index']
)->name('kontak.index');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | PENDAFTARAN CGPI
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/cgpi/pendaftaran',
        [PendaftaranController::class, 'store']
    )->name('pendaftaran.store');

    Route::get(
        '/cgpi/status-pendaftaran',
        [PendaftaranController::class, 'status']
    )->name('pendaftaran.status');

    Route::get(
        '/cgpi/download-pdf/{id}',
        [PendaftaranController::class, 'downloadPdf']
    )->name('pendaftaran.download-pdf');

    Route::post(
        '/pendaftaran/upload-dokumen/{id}',
        [PendaftaranController::class, 'uploadDokumen']
    )->name('pendaftaran.upload-dokumen');

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {

        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('cgpi.informasi');

    })->name('dashboard');

    Route::get(
        '/admin/dashboard',
        [DashboardController::class, 'index']
    )->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | ADMIN PENDAFTARAN
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/pendaftaran',
        [AdminPendaftaranController::class, 'index']
    )->name('admin.pendaftaran.index');

    Route::get(
        '/admin/pendaftaran/{id}',
        [AdminPendaftaranController::class, 'show']
    )->name('admin.pendaftaran.show');

    Route::post(
        '/admin/pendaftaran/{id}/terima',
        [AdminPendaftaranController::class, 'terima']
    )->name('admin.pendaftaran.terima');

    Route::post(
        '/admin/pendaftaran/{id}/tolak',
        [AdminPendaftaranController::class, 'tolak']
    )->name('admin.pendaftaran.tolak');

    Route::delete(
        '/pendaftaran/{id}',
        [App\Http\Controllers\Admin\AdminPendaftaranController::class, 'destroy']
    )->name('admin.pendaftaran.destroy');

    /*
    |--------------------------------------------------------------------------
    | ADMIN BERITA
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'admin/berita',
        AdminBeritaController::class
    )->names('admin.berita');

    /*
    |--------------------------------------------------------------------------
    | ADMIN REGULASI
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'admin/regulasi',
        AdminRegulasiController::class
    )->names('admin.regulasi');

    /*
    |--------------------------------------------------------------------------
    | ADMIN PENGATURAN KONTAK (TAMBAHAN BARU)
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/pengaturan',
        [KontakSettingController::class, 'adminEdit']
    )->name('admin.pengaturan.edit');

    Route::put(
        '/admin/pengaturan',
        [KontakSettingController::class, 'adminUpdate']
    )->name('admin.pengaturan.update');

});

require __DIR__.'/auth.php';    
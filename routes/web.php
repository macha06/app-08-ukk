<?php

use App\Models\Buku;
use App\Exports\UserExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\KoleksiBukuController;
use App\Http\Controllers\AdminBerandaController;
use App\Http\Controllers\BukuLandingControlller;
use App\Http\Controllers\BukuPeminjamController;
use App\Http\Controllers\DataPeminjamanController;
use App\Http\Controllers\PetugasBerandaController;
use App\Http\Controllers\PeminjamBerandaController;
use App\Http\Controllers\AprovePeminjamanController;
use App\Http\Controllers\ProfilePeminjamController;
use App\Http\Controllers\ProfilePetugasController;

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
#Auth
Route::get('/', [BukuLandingControlller::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'auth.admin'])->group(function () {
    Route::resource('user', UserController::class);
    Route::get('beranda', [AdminBerandaController::class, 'index'])->name('admin.beranda');
    Route::resource('buku', BukuController::class);
    Route::resource('kategori', KategoriController::class);
    Route::get('peminjaman', [DataPeminjamanController::class, 'index'])->name('admin.peminjaman');
    Route::post('peminjaman/export', [DataPeminjamanController::class, 'export'])->name('admin.peminjaman.export');
    Route::get('/export-users', [ExportController::class, 'exportUsers'])->name('export.users');
    Route::get('/export-buku', [ExportController::class, 'exportBuku'])->name('export.buku');
    Route::resource('profile', ProfileController::class);
});


Route::prefix('petugas')->middleware(['auth', 'auth.petugas'])->group(function () {
    Route::get('beranda', [PetugasBerandaController::class, 'index'])->name('petugas.beranda');
    Route::resource('peminjam', PeminjamController::class);
    Route::resource('buku', BukuController::class);
    Route::get('/peminjaman/approve', [AprovePeminjamanController::class, 'index'])->name('approve.index');
    Route::get('/peminjaman/kembalikan', [AprovePeminjamanController::class, 'indexKembali'])->name('kembalikan.index');
    Route::post('/peminjaman/{id}/approve', [AprovePeminjamanController::class, 'approveLoan'])->name('approve.loan');
    Route::post('/peminjaman/{id}/reject', [AprovePeminjamanController::class, 'rejectLoan'])->name('reject.loan');
    Route::post('/peminjaman/{id}/kembalikan', [PeminjamanController::class, 'kembalikan'])->name('buku.kembalikan');
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('petugas.peminjaman');
    Route::post('peminjaman/export', [DataPeminjamanController::class, 'export'])->name('admin.peminjaman.export');
    Route::get('peminjaman/approve/{id}/tolak', [AprovePeminjamanController::class, 'indexTolak'])->name('approve.tolak');
    Route::get('/export-buku', [ExportController::class, 'exportBuku'])->name('export.buku');
    Route::resource('profile-petugas', ProfilePetugasController::class);
});
Route::prefix('peminjam')->middleware(['auth', 'auth.peminjam'])->group(function () {
    Route::get('beranda', [PeminjamBerandaController::class, 'index'])->name('peminjam.beranda');
    Route::resource('bukus', BukuPeminjamController::class);
    Route::get('/buku/{id}/pinjem', [BukuController::class, 'pinjem'])->name('buku.pinjam.create');
    Route::post('/buku/{id}/pinjam', [PeminjamanController::class, 'pinjam'])->name('buku.pinjam')->middleware('check.nik');
    Route::get('/buku/pinjaman', [PeminjamanController::class, 'borrowedBooks'])->name('buku.pinjaman');
    Route::get('/peminjaman/{id}/cetak-struk-pdf', [PeminjamanController::class, 'cetakStruk'])->name('peminjaman.cetak_struk_pdf');
    Route::resource('koleksi', KoleksiBukuController::class);
    Route::get('/buku/{buku_id}/ulasan', [UlasanController::class, 'create'])->name('ulasan.create');
    Route::post('/buku/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');
    Route::resource('profile-peminjam', ProfilePeminjamController::class);
});
Route::get('logout', function () {
    Auth::logout();
    Alert::success('Success', 'Logout Success');
    return redirect('/login');
});

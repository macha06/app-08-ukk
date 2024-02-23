<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\AdminBerandaController;
use App\Http\Controllers\BukuLandingControlller;
use App\Http\Controllers\BukuPeminjamController;
use App\Http\Controllers\PetugasBerandaController;
use App\Http\Controllers\PeminjamBerandaController;

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
#Route::get('/login', function () {
   # return view('auth.login');
#});
#Route::get('/register', function () {
    #return view('auth.register');
#});

#admin
#

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'auth.admin'])->group(function () {
    Route::resource('user', UserController::class);
    Route::get('beranda', [AdminBerandaController::class, 'index'])->name('admin.beranda');
    Route::resource('buku', BukuController::class);
    Route::resource('kategori', KategoriController::class);
});


Route::prefix('petugas')->middleware(['auth', 'auth.petugas'])->group(function () {
    Route::get('beranda', [PetugasBerandaController::class, 'index'])->name('petugas.beranda');
    Route::resource('peminjam', PeminjamController::class);
    Route::resource('buku', BukuController::class);
});
Route::prefix('peminjam')->middleware(['auth', 'auth.peminjam'])->group(function () {
    Route::get('beranda', [PeminjamBerandaController::class, 'index'])->name('peminjam.beranda');
    Route::resource('bukus', BukuPeminjamController::class);
});
Route::get('logout', function () {
    Auth::logout();
    return redirect('/login');
});

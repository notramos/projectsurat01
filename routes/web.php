<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ProfileController;


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

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/registrasi', [RegistrasiController::class, 'store']);
    Route::get('/registrasi', [RegistrasiController::class, 'index']);
    Route::post('/login', [LoginController::class, 'auth'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::resource('surat_masuk', SuratMasukController::class);
    Route::resource('surat_keluar', SuratKeluarController::class);
   
    Route::resource('dashboard', DashboardController::class);
    Route::get('/export/surat-masuk', [ExportController::class, 'exportSuratMasuk'])->name('export.suratMasuk');
    Route::get('/export/surat-keluar', [ExportController::class, 'exportSuratKeluar'])->name('export.suratKeluar');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


Route::middleware(['admin'])->group(function(){
    Route::resource('category', CategoryController::class);
});





    

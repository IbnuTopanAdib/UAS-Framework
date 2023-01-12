<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PembimbingController;

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

Route::get('/', function () {
    return view('login.index');
});



Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);
Route::get('/register',[RegisterController::class, 'index']);
Route::post('/register',[RegisterController::class, 'store']);
Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth');
Route::resource('/magang', MagangController::class)->middleware('auth');
Route::resource('/pembimbing', PembimbingController::class)->middleware('auth');
Route::resource('/mahasiswa', MahasiswaController::class)->middleware('auth');

Route::prefix('mahasiswa')->group(function () {
    Route::get('/take/{mahasiswa}', [MahasiswaController::class, 'take'])->name('mahasiswas.take');
    Route::post('/take/{mahasiswa}', [MahasiswaController::class, 'takeStore'])->name('mahasiswas.takeStore');
});

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\SkripsiController;
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

Route::get('/', function () {
    return view('main.index');
})->middleware('auth');

// Route LOGIN
Route::get('login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');
Route::post('login', [AuthController::class, 'authenticate']);

// Route REGISTER
Route::get('register', [AuthController::class, 'register'])->middleware('guest');
Route::post('register', [AuthController::class, 'registerProcess'])->middleware('guest');

// Route KELOLA SKRIPSI
Route::get('tabel-skripsi', [SkripsiController::class, 'index'])->middleware('auth');

// Route KELOLA USER
Route::get('data-mahasiswa', [ManageUserController::class, 'index'])->middleware('auth');

Route::get('/tabel-judul', function () {
    return view('main.tabel-judul');
});
Route::get('/tabel-proposal', function () {
    return view('main.tabel-proposal');
});
Route::get('/tabel-hasil', function () {
    return view('main.tabel-hasil');
});
Route::get('/form-biodata', function () {
    return view('main.form-biodata');
});
Route::get('/register', function () {
    return view('main.register');
});
Route::get('/data-dosen', function () {
    return view('main.data-dosen');
});
Route::get('/tambah-dosen', function () {
    return view('main.tambah-dosen');
});
Route::get('/edit-biodata', function () {
    return view('main.edit-biodata');
});


// Route TIMELINE
Route::get('timeline', [SkripsiController::class, 'timeline'])->middleware('auth');
// Route UPLOAD FILE PROPOSAL
Route::post('upload-file-proposal', [SkripsiController::class, 'uploadProposal'])->middleware('auth');
// Route UPLOAD FILE HASIL
Route::post('upload-file-hasil', [SkripsiController::class, 'uploadHasil'])->middleware('auth');
// Route UPLOAD FILE SKRIPSI
Route::post('upload-file-skripsi', [SkripsiController::class, 'uploadSkripsi'])->middleware('auth');

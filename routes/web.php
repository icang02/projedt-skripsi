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
Route::get('data-mahasiswa/create', [ManageUserController::class, 'create'])->middleware('auth');
Route::get('data-mahasiswa/edit/{user}', [ManageUserController::class, 'edit'])->middleware('auth');
Route::put('data-mahasiswa/update/{user}', [ManageUserController::class, 'update'])->middleware('auth');
Route::post('data-mahasiswa/store', [ManageUserController::class, 'store'])->middleware('auth');
Route::delete('data-mahasiswa/destroy/{user}', [ManageUserController::class, 'destroy'])->middleware('auth');

// Route RESET PASSWORD
Route::get('reset-password/{user}', [ManageUserController::class, 'resetPassword'])->middleware('auth');

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

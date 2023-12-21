<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;

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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('penjual');
Route::post('/', [LoginController::class, 'store'])->name('login.store')->middleware('penjual');

Route::post('/logout', [LogoutController::class, 'index'])->name('logout')->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store')->middleware('guest');

Route::get('/job', [JobController::class, 'index'])->name('job')->middleware('penjual');
Route::get('/job/usercreate', [JobController::class, 'create'])->name('job.create')->middleware('penjual');
Route::post('/job', [JobController::class, 'store'])->name('job.store')->middleware('penjual');
Route::get('/job/{id}/edit', [JobController::class, 'edit'])->name('job.edit')->middleware('penjual');
Route::put('/job/{id}', [JobController::class, 'update'])->name('job.update')->middleware('penjual');
Route::delete('/job/{id}', [JobController::class, 'destroy'])->name('job.destroy')->middleware('penjual');
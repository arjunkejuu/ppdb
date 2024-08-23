<?php

use App\Http\Middleware\CheckReferer;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/pdb', [App\Http\Controllers\PdbController::class,'index'])->name('pdb.index');
Route::post('/daftar', [App\Http\Controllers\PdbController::class, 'daftar'])->name('pdb.daftar');
Route::get('/status-pendaftaran', [App\Http\Controllers\StatusController::class,'status'])->name('status');
Route::get('/email', function () {
    Mail::to('arjunkeju@gmail.com')->send(new NotificationMail());
    return new NotificationMail();
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/dashboard/detail/{id_pdb}', [App\Http\Controllers\DashboardController::class,'dataPdb'])->name('admin.dashboard.detail');
Route::get('/dashboard/edit/{id_pdb}', [App\Http\Controllers\DashboardController::class,'edit'])->name('admin.dashboard.edit');
Route::post('/dashboard/update/{id_pdb}', [App\Http\Controllers\DashboardController::class,'update'])->name('admin.dashboard.update');
Route::get('/export-pdb/{id_pdb}', [App\Http\Controllers\PdbExportController::class,'exportToWord'])->name('export.pdb');

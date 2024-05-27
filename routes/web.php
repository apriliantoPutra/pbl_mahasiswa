<?php

use App\Http\Controllers\DBBackupController;
use App\Http\Controllers\JadwalBimbinganController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\logbookController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\JadwalSeminarController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PendaftaranController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

*/

Route::get('/', function () {
    return view('welcome');
});

Route::permanentRedirect('/', '/login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('profil', ProfilController::class)->except('destroy');

Route::resource('manage-user', UserController::class);
Route::resource('manage-role', RoleController::class);
Route::resource('manage-menu', MenuController::class);
Route::resource('logbook-magang', logbookController::class);
Route::resource('laporan-magang', LaporanController::class);
Route::resource("laporanmagang", LaporanController::class);
Route::resource('nilai-magang', NilaiController::class);
Route::resource('nilai', NilaiController::class);
Route::resource('daftar-magang', PendaftaranController::class);
Route::resource('jadwal-bimbingan-magang', JadwalBimbinganController::class);
Route::resource('jadwal-seminar-magang', JadwalSeminarController::class);
Route::get('/view-pdf/{logbook_id}', 'App\Http\Controllers\logbookController@viewPdf')->name('view_pdf');
Route::get('/logbook-magang/{logbook_magang}/edit', [logbookController::class, 'edit'])->name('logbook-magang.edit');
Route::put('/logbook-magang/{logbook_magang}/update', [logbookController::class, 'update'])->name('logbook-magang.update');

Route::resource('manage-permission', PermissionController::class)->only('store', 'destroy');
// Route::get('/daftar-magang', [PendaftaranController::class, 'index'])->name('daftar-magang.index');
// Route::get('/daftar-magang/dataindusrti', [PendaftaranController::class, 'dataindustri'])->name('daftar-magang.dataindustri');
// Route::post('/daftar-magang/store', [PendaftaranController::class, 'store'])->name('daftar-magang.store');
// Route::resource('/daftar-magang', PendaftaranController::class);

Route::get('dbbackup', [DBBackupController::class, 'DBDataBackup']);

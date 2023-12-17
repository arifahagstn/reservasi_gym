<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\AuthController;
use App\Models\Jadwal;
use App\Models\Reservasi;

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

// Route::get('/', function () {
//     return view('template.master');
// })->name('master');
// Route::resource('pelatih', PelatihController::class);
// Route::resource('gym', GymController::class);
// Route::resource('jadwal', JadwalController::class);
// Route::resource('reservasi', ReservasiController::class);

// Route::get('/master', [MasterController::class, 'master'])->name('master');
// Route::get('/', [MasterController::class, 'content'])->name('index')->middleware('auth');
Route::get('/', [GymController::class, 'index'])->name('dashboard');
Route::resource('/gym', GymController::class)->middleware('auth');
Route::resource('/pelatih', PelatihController::class)->middleware('auth')->middleware('can:isAdmin');
// Route::resource('/jadwal', JadwalController::class)->middleware('auth');
// Route::resource('reservasi', ReservasiController::class)->middleware('auth');

Route::controller(AuthController::class)->group(function() {
    Route::get('/registration', 'register')->name('auth.register');
    Route::post('/store', 'store')->name('auth.store');
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/auth', 'authentication')->name('auth.authentication');
    Route::get('/dashboard', 'dashboard')->name('auth.dashboard');
    Route::get('/logout', 'logout')->name('auth.logout');
    Route::get('/profile', 'profile')->name('auth.profile'); 
});

// Route::get('/profile/{user}', [ProfilesController::class, 'show'])->name('user.profile')->middleware('auth');

Route::get('/reservasi/create/gym/{gym}', [ReservasiController::class,'create'])->name('reservasi.create');
Route::post('/reservasi/store/gym/', [ReservasiController::class,'store'])->name('reservasi.store');
Route::get('/reservasi/edit/{id}', [ReservasiController::class, 'edit'])->name('reservasi.edit');
Route::put('/reservasi/update/gym/{reservasi}', [ReservasiController::class,'update'])->name('reservasi.update');
Route::get('/reservasi/gym/index', [ReservasiController::class,'index'])->name('reservasi.index')->middleware('auth');
Route::get('/pdf', [ReservasiController::class, 'createPDF']);

Route::get('/jadwal/create/gym/{gym}', [JadwalController::class,'create'])->name('jadwal.create')->middleware('auth')->middleware('can:isAdmin');
Route::post('/jadwal/store/gym/', [JadwalController::class,'store'])->name('jadwal.store');
Route::get('/jadwal/gym/index', [JadwalController::class,'index'])->name('jadwal.index');
Route::get('/jadwal/edit/{id}', [JadwalController::class, 'edit'])->name('jadwal.edit');
Route::put('/jadwal/update/gym/{jadwal}', [JadwalController::class,'update'])->name('jadwal.update');
Route::delete('/jadwal/{jadwal}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');
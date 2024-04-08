<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SlipGajiController;
use App\Http\Controllers\BillingController;

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

Route::middleware(['guest:magang'])->group(function (){
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');
    Route::get('/proseslogin', [AuthController::class, 'proseslogin']);
});

Route::middleware(['guest:magang'])->group(function () {
    Route::get('/panel', function () {
        return view('auth.loginadmin');
    })->name('loginadmin');
    Route::get('/prosesloginadmin', [AuthController::class, 'prosesloginadmin']);
});


Route::middleware(['auth:magang'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/proseslogout', [AuthController::class, 'proseslogout']);
    
    //Presensi
    Route::get('/presensi/create', [PresensiController::class,'create']);
    Route::post('/presensi/presensi/store', [PresensiController::class,'store']);

    //Edit profile
    Route::get('/editprofile', [PresensiController::class, 'editprofile']);
    Route::post('/presensi/{nim}/updateprofile', [PresensiController::class, 'updateprofile']);

    //Histori
    Route::get('/presensi/histori', [PresensiController::class, 'histori']);
    Route::post('/gethistori', [PresensiController::class, 'gethistori']);

    //Izin
    Route::get('/presensi/izin', [PresensiController::class, 'izin']);
    Route::get('/presensi/buatizin', [PresensiController::class, 'buatizin']);
    Route::post('/presensi/storeizin', [PresensiController::class, 'storeizin']);

    //Presensi
    Route::get('/presensi/laporan', [PresensiController::class, 'laporan']);
    Route::get('/presensi/cetaklaporan', [PresensiController::class, 'cetaklaporan']);
    Route::get('/presensi/izinsakit', [PresensiController::class, 'izinsakit']);

    //Pinjaman
    Route::get('/pinjaman/pinjaman', [PinjamanController::class, 'index'])->name('pinjaman.pinjaman');
    Route::get('/pinjaman/create', [PinjamanController::class, 'create'])->name('pinjaman.create');
    Route::post('/pinjaman/store', [PinjamanController::class, 'store'])->name('pinjaman.store');
    Route::get('/pinjaman/{id}/edit', [PinjamanController::class, 'edit'])->name('pinjaman.edit');
    Route::post('/pinjaman/{id}/update', [PinjamanController::class, 'update'])->name('pinjaman.update');
    Route::post('/pinjaman/{id}', [PinjamanController::class, 'destroy'])->name('pinjaman.destroy');

    //Task
    Route::get('/task/index', [TaskController::class, 'index'])->name('task.index');
    Route::get('/task/create', [TaskController::class, 'create']);
    Route::post('/task/submit', [TaskController::class, 'submit'])->name('task.submit');
    Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::post('/task/update', [TaskController::class, 'update'])->name('task.update');

    //Salary
    Route::get('/slipgaji/index', [SlipGajiController::class, 'index'])->name('slipgaji.index');

    //Billing
    Route::get('/billing/index', [BillingController::class, 'index']);


});

Route::get('/dashboardadmin', [DashboardController::class, 'dashboardadmin']);
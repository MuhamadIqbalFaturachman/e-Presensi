<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PresensiController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/panel', function () {
        return view('auth.loginadmin');
    })->name('loginadmin');
});

Route::post('/prosesloginadmin', [AuthController::class, 'prosesloginadmin']);


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
});

Route::get('/dashboardadmin', [DashboardController::class, 'dashboardadmin']);
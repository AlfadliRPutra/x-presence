<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PresensiController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\PostDec;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthenticationController::class, 'index'])->name('login');
    Route::post('/login/processing', [AuthenticationController::class, 'processLogin'])->name('post-login');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware('userAccess:Admin')->group(function () {
        Route::get('/dashboard-admin', [DashboardController::class, 'dashboardadmin'])->name('admin.dashboard');
        Route::get('/logout-admin', [AuthenticationController::class, 'logout'])->name('logout-admin');
        Route::get('/intern', [UserController::class, 'index']);
        Route::post('/intern/store', [UserController::class, 'store']);
        Route::get('/intern/{id}/edit', [UserController::class, 'edit']);
        Route::post('/intern/{id}', [UserController::class, 'update'])->name('intern.update');
        Route::get('/intern/{id}/delete', [UserController::class, 'destroy']);
        Route::get('/presensi/monitoring', [PresensiController::class, 'monitoring']);
        Route::post('/getpresensi', [PresensiController::class, 'getpresensi']);
        Route::post('/showmap', [PresensiController::class, 'showmap']);
        Route::get('/presensi/laporan', [PresensiController::class, 'laporan']);
        Route::post('/presensi/cetaklaporan', [PresensiController::class, 'cetaklaporan']);
        Route::get('/presensi/rekap', [PresensiController::class, 'rekap']);
        Route::post('/presensi/cetakrekap', [PresensiController::class, 'cetakrekap']);

        Route::get('/configure/officesite', [OfficeController::class, 'index']);
        Route::post('/configure/updatelocation', [OfficeController::class, 'update']);

        Route::get('/presensi/izinsakit', [PresensiController::class, 'izinsakit']);
        Route::post('/presensi/approveizinsakit', [PresensiController::class, 'approveizinsakit']);
        Route::get('/presensi/{id}/batalizinsakit', [PresensiController::class, 'batalizinsakit']);
        // Route::post('/configure/store',[ConfigureController::class,'store']);
    });

    Route::middleware('userAccess:Intern')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'InternDashboard'])->name('intern.dashboard');
        Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');


        Route::get('/presensi/create', [PresensiController::class, 'index']);
        Route::post('/presensi/store', [PresensiController::class, 'store']);

        Route::get('/editprofile', [PresensiController::class, 'edit'])->name('profile')->name('intern.profile-edit');
        Route::post('/presensi/{nik}/updateprofile', [PresensiController::class, 'update']);

        Route::get('/presensi/history', [PresensiController::class, 'history']);
        Route::post('/gethistory', [PresensiController::class, 'gethistory']);


        Route::get('/absensi', [AbsensiController::class, 'index'])->name('intern.absensi');
        Route::get('/absensi/form', [AbsensiController::class, 'create'])->name('intern.absensi-form');
        Route::post('/absensi/form/store', [AbsensiController::class, 'store'])->name('intern.absensi-form.store');
    });
});

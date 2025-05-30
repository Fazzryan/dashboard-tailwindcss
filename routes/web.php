<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('fe.pages.beranda');
});

Route::get('/login', function () {
    return view('login');
});


//--------------------------------------------------------------------------
//  Route Autentikasi
//--------------------------------------------------------------------------
// Route::group(['as' => 'auth.', 'prefix' => '/'], function () {
//     Route::get('/login', [AuthController::class, 'login'])->name('login');
//     Route::get('/registrasi', [AuthController::class, 'registrasi'])->name('registrasi');

//     Route::post('/action-login', [AuthController::class, 'actLogin'])->name('actLogin')->middleware('throttle:login.email');
//     Route::post('/add-registrasi', [AuthController::class, 'addRegistrasi'])->name('addRegistrasi');
//     Route::get('/logout', [AuthController::class, 'actLogout'])->name('actLogout');
// });

//--------------------------------------------------------------------------
//  Route Backend 'middleware' => 'cek-pengunjung'
//--------------------------------------------------------------------------
Route::group(['as' => 'be.', 'prefix' => '/dashboard'], function () {
    //--------------------------------------------------------------------------
    //  Route Dashboard  
    //--------------------------------------------------------------------------
    Route::get('/', function () {
        return view('be.pages.dashboard.index');
    });
    // Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});

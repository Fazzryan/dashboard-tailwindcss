<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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
    })->name('dashboard');

    //--------------------------------------------------------------------------
    //  Route Projects  
    //--------------------------------------------------------------------------
    Route::group(['as' => 'projects.', 'prefix' => '/projects'], function () {
        Route::get('/', function () {
            return view('be.pages.projects.index');
        })->name('index');
    });
    // Route::resource('projects', ProjectController::class);
});

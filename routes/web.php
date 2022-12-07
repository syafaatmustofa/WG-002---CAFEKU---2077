<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
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
|
*/

// route beranda
Route::resource('beranda', BerandaController::class);
Route::get('/', [BerandaController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route auth
Auth::routes();

Route::middleware(['auth'])->group(function () {
    // route dashboard
    Route::resource('dashboard', DashboardController::class);
    Route::get('dashboard', [DashboardController::class, 'index']);
});

Route::middleware(['auth', 'admin'])->group(function () {

    // route kategori
    Route::resource('kategori', KategoriController::class);
    Route::get('deletekategori/{kategori}', [KategoriController::class, 'destroy'])->name('deletekategori');

    //  route menu
    Route::resource('menu', MenuController::class);
    Route::get('deletemenu/{menu}', [MenuController::class, 'destroy'])->name('deletemenu');
});

Route::middleware(['auth', 'owner'])->group(function () {

    // route user
    Route::resource('datauser', UserController::class);
    Route::get('deleteuser/{id}', [UserController::class, 'destroy'])->name('deleteuser');
});

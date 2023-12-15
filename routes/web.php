<?php

use App\Http\Controllers\ProfileController;
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
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/', [\App\Http\Controllers\HomeController::class, 'createUrl'])->name('create.url');
Route::get('/tinyurl/{id}', [\App\Http\Controllers\HomeController::class, 'getURL'])->name('get.url');
Route::get('/redirect/{id}', [\App\Http\Controllers\HomeController::class, 'redirectURL'])->name('redirect');


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [\App\Http\Controllers\DashboardController::class, 'createUrl'])->name('dashboard.create.url');
    Route::get('/edit/{id}', [\App\Http\Controllers\DashboardController::class, 'editUrl'])->name('dashboard.edit.url');
    Route::put('/edit/{id}', [\App\Http\Controllers\DashboardController::class, 'updateUrl'])->name('dashboard.update.url');
    Route::delete('/delete/{id}', [\App\Http\Controllers\DashboardController::class, 'deleteUrl'])->name('dashboard.delete.url');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__.'/auth.php';

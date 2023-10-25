<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ListEtudiantController;

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

Route::middleware('auth')->group(function () {

    Route::resource('user', UserController::class)->middleware('admin');
    Route::get('list',ListEtudiantController::class)->name('user.list');
    
});

Route::get('/', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

                

Route::get('/dashboard',[UserController::class,'index'])->middleware(['auth', 'verified','admin'])->name('dashboard');





Route::middleware('auth')->group(function () {
    Route::get('/acceuil',[ArticleController::class,'index'])->name('acceuil');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

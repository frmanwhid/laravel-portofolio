<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\depanController;
use App\Http\Controllers\skillController;
use App\Http\Controllers\halamanController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\experienceController;
use App\Http\Controllers\pengaturanHalamanController;


Route::get('/',[depanController::class, "index"]);

Route::redirect('home', 'dashboard');
Route::get('/auth', [authController::class, "index"])->name('login')->middleware('guest');
Route::get('/auth/redirect',[authController::class, "redirect"])->middleware('guest');
Route::get('/auth/callback',[authController::class, "callback"])->middleware('guest');
Route::get('/auth/logout', [authController::class, "logout"]);
Route::get('/dashboard', function (){
    
});


Route::prefix('dashboard')->middleware('auth')->group(
    function() {
        Route::get('/', [halamanController::class, 'index']);
        Route::resource('halaman', halamanController::class);
        Route::resource('experience', experienceController::class);
        Route::resource('education', educationController::class);
        Route::get('skill', [skillController::class, "index"])->name('skill.index');
        Route::post('skill', [skillController::class, "update"])->name('skill.update');
        Route::get('profile', [profileController::class, "index"])->name('profile.index');  
        Route::post('profile', [profileController::class, "update"])->name('profile.update');
        Route::get('pengaturanhalaman', [pengaturanHalamanController::class, "index"])->name('pengaturanhalaman.index');  
        Route::post('pengaturanhalaman', [pengaturanHalamanController::class, "update"])->name('pengaturanhalaman.update');

    }
);

<?php

use App\Http\Controllers\Homepage\HomepageController;
use App\Http\Controllers\Homepage\AuthenticationController;
use App\Http\Controllers\LangController;
use App\Http\Middleware\LangMiddleware;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/lang/{locale}', [LangController::class, 'setLang'])->name('changeLang');

Route::middleware(LangMiddleware::class)->group(function () {

    Route::get('/', function () {
        return view('homepage/homepage');
    });

    // Route::get('/homepage', function () {
    //     return view('homepage/homepage')->name('homepage');
    // });

    // Route::get('/login', [AuthenticationController::class, 'login'])->name('login');

    // Route::get('/register', [AuthenticationController::class, 'register'])->name('register');
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';

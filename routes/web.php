<?php

use App\Http\Controllers\Homepage\HomepageController;
use App\Http\Controllers\LangController;
use App\Http\Middleware\LangMiddleware;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/lang/{locale}', [LangController::class, 'setLang'])->name('changeLang');

Route::middleware(LangMiddleware::class)->group(function () {

    Route::get('/', [HomepageController::class, 'homepage'])->name('homepage');

    Route::get('/homepage', [HomepageController::class, 'homepage'])->name('homepage');
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
require __DIR__ . '/post.php';
require __DIR__ . '/comment.php';

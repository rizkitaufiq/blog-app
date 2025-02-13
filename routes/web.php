<?php

use App\Http\Controllers\Homepage\HomepageController;
use App\Http\Controllers\Homepage\AuthenticationController;
use App\Http\Controllers\LangController;
use App\Http\Middleware\LangMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/lang/{locale}', [LangController::class, 'setLang'])->name('changeLang');

Route::middleware(LangMiddleware::class)->group(function () {

    Route::get('/', function () {
        return view('homepage/homepage');
    });

    Route::get('/login', [AuthenticationController::class, 'login'])->name('login');

    Route::get('/register', [AuthenticationController::class, 'register'])->name('register');
});

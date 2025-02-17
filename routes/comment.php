<?php

use App\Http\Controllers\Homepage\CommentController;
use App\Http\Middleware\LangMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(LangMiddleware::class)->group(function () {

    Route::middleware(['auth'])->group(function () {

        Route::post('/comment', [CommentController::class, 'comment'])->name('comment');
    });
});

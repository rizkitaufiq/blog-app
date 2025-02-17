<?php

use App\Http\Controllers\Homepage\PostController;
use App\Http\Middleware\LangMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(LangMiddleware::class)->group(function () {

    Route::middleware(['auth'])->group(function () {

        Route::get('/post', [PostController::class, 'post'])->name('post');

        Route::post('/post/create', [PostController::class, 'create'])->name('post.create');

        Route::get('/post/{id}/update', [PostController::class, 'update'])->name('post.update');
        Route::put('/post/update/{id}', [PostController::class, 'updateProcess'])->name('post.updateProcess');

        Route::delete('/post/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
    });
});

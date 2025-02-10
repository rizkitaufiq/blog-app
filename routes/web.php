<?php

use App\Http\Controllers\Homepage\HomepageController;
use App\Http\Controllers\LangController;
use App\Http\Middleware\LangMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/lang/{locale}', [LangController::class, 'setLang'])->name('changeLang');

Route::middleware(LangMiddleware::class)->group(function () {

    Route::get('/', function () {
        return view('homepage/homepage');
    });
});

// Route::get('/lang/{locale}', function ($locale) {
//     if (!in_array($locale, ['en', 'id'])) {
//         abort(400);
//     }
//     Session::put('locale', $locale);
//     return redirect()->back();
// })->name('changeLang');

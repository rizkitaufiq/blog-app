<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Middleware\LangMiddleware;

// use App\Http\Controllers\Auth\VerifyEmailController;
// use App\Http\Controllers\Auth\ConfirmablePasswordController;
// use App\Http\Controllers\Homepage\HomepageController;
// use App\Http\Controllers\Auth\EmailVerificationNotificationController;
// use App\Http\Controllers\Auth\EmailVerificationPromptController;
// use App\Http\Controllers\Auth\NewPasswordController;
// use App\Http\Controllers\Auth\PasswordController;
// use App\Http\Controllers\Auth\PasswordResetLinkController;

Route::middleware(LangMiddleware::class)->group(
    function () {
        Route::middleware('guest')->group(function () {
            Route::get('register', [RegisteredUserController::class, 'register'])
                ->name('register');

            Route::post('registerProcess', [RegisteredUserController::class, 'registerProcess'])->name('register.process');

            Route::get('login', [AuthenticatedSessionController::class, 'login'])
                ->name('login');

            Route::post('login', [AuthenticatedSessionController::class, 'loginProcess']);

            // Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
            //     ->name('password.request');

            // Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
            //     ->name('password.email');

            // Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
            //     ->name('password.reset');

            // Route::post('reset-password', [NewPasswordController::class, 'store'])
            //     ->name('password.store');
        });

        Route::middleware('auth')->group(function () {
            Route::get('/email/verify/{token}', function (Request $request, $token) {

                if (!$token) {
                    return response()->json(['message' => 'Token not found !'], 400);
                }

                try {

                    $user = JWTAuth::parseToken()->authenticate();
                    if (!$user) {
                        return response()->json(['message' => 'User not found !'], 404);
                    }

                    $user->email_verified_at = now();
                    $user->save();

                    return view('homepage.authentication.email-verified');
                } catch (\Exception $e) {

                    return response()->json(['message' => 'invalid token !'], 400);
                }
            });

            Route::post('logout', [AuthenticatedSessionController::class, 'logout'])
                ->name('logout');

            // Route::get('verify-email', EmailVerificationPromptController::class)
            //     ->name('verification.notice');

            // Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
            //     ->middleware(['signed', 'throttle:6,1'])
            //     ->name('verification.verify');

            // Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            //     ->middleware('throttle:6,1')
            //     ->name('verification.send');

            // Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
            //     ->name('password.confirm');

            // Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

            // Route::put('password', [PasswordController::class, 'update'])->name('password.update');

        });
    }
);

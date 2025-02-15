<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Notifications\VerifyJWTEmailNotification;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function register(): View
    {
        return view('homepage.authentication.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function registerProcess(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'regex:/^\S*$/u', 'max:30'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:30', 'unique:' . User::class],
            'password' => ['required', 'min:8', 'confirmed', Rules\Password::defaults()],
        ], [
            'username.required' => __('auth.username_required'),
            'username.string' => __('auth.username_string'),
            'username.regex' => __('auth.username_regex'),
            'username.max' => __('auth.username_max'),

            'email.required' => __('auth.email_required'),
            'email.string' => __('auth.email_string'),
            'email.lowercase' => __('auth.email_lowercase'),
            'email.email' => __('auth.email_email'),
            'email.max' => __('auth.email_max'),
            'email.unique' => __('auth.email_unique'),

            'password.required' => __('auth.password_required'),
            'password.min' => __('auth.password_min'),
            'password.confirmed' => __('auth.password_confirmed'),

        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = JWTAuth::fromUser($user);

        Notification::send($user, new VerifyJWTEmailNotification($token));

        // session()->flash('verification_token', $token);

        // return response()->json([
        //     'message' => 'Silakan cek email untuk verifikasi akun!',
        //     'token' => $token,
        // ], 201);

        // Auth::login($user);

        return redirect()->route('login')->with('success', __('auth.account_creation_successful'));
    }
}

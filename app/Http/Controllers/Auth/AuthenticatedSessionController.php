<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function login(): View
    {
        return view('homepage.authentication.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function loginProcess(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:30'],
            'password' => ['required', 'min:8'],
        ], [
            'email.required' => __('auth.email_required'),
            'email.string' => __('auth.email_string'),
            'email.lowercase' => __('auth.email_lowercase'),
            'email.email' => __('auth.email_email'),
            'email.max' => __('auth.email_max'),

            'password.required' => __('auth.password_required'),
            'password.min' => __('auth.password_min'),

        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if (!$user->email_verified_at) {
                Auth::logout();
                return back()->withErrors(['email' => __('auth.email_not_verified')]);
            }

            return redirect()->route('homepage')->with('success', __('auth.login_successful'));
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', __('auth.logout_successful'));
    }
}

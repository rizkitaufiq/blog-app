<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;


class LangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $availableLocales = config('lang.locales', []);

        if (Session::has('locale') && in_array(Session::get('locale'), $availableLocales)) {
            App::setLocale(Session::get('locale'));
        }

        // $locale = Session::get('locale') ?? 'en';
        // Session::put('locale', $locale);
        // App::setLocale($locale);

        return $next($request);
    }
}

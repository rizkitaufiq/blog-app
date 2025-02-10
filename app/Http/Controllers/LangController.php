<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    //
    public function setLang(string $locale)
    {
        //
        $availableLocales = config('lang.locales', []);

        if (empty($availableLocales)) {
            throw new HttpException(500, 'Configuration error: lang.locales is empty.');
        }

        if (!in_array($locale, $availableLocales)) {
            throw new HttpException(400, 'Language not supported');
        }

        Session::put('locale', $locale);
        App::setLocale($locale);

        return back();
    }
}

<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    //
    public function login()
    {
        return view('homepage.authentication.login');
    }

    public function register()
    {
        return view('homepage.authentication.register');
    }
}

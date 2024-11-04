<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Mail\VerificationEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;


class AuthController extends Controller
{
    public function store(Request $request)
    {
        // Autentikasi user
        $this->validateLogin($request);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            // Redirect berdasarkan tipe user
            if (Auth::user()->usertype == 'admin') {
                return redirect()->intended('/admin.adminhome'); // Admin ke halaman admin
            } else {
                return redirect()->intended('/home'); // User ke halaman user
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Tambahkan fungsi validasi login
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    }


}

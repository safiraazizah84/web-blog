<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Mail\OtpMail;
use Illuminate\Http\Request;
use App\Mail\VerificationEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;


class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = User::find(Auth::id());
            
            if (!$user->hasVerifiedEmail()) {
                Auth::logout();
                return redirect()->route('login')->withErrors(['email' => 'Email belum diverifikasi.']);
            }

            // Generate OTP
            $otp = rand(100000, 999999);
            $user->otp_code = $otp;
            $user->otp_expiration = Carbon::now()->addMinutes(10);
            $user->save();

            // Kirim OTP ke email pengguna
            Mail::to($user->email)->send(new OtpMail($otp));

            // Redirect ke halaman OTP
            return redirect()->route('otp.verify');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }


    public function showOtpForm()
    {
        return view('auth.otp');
    }

    public function verifyOtp(Request $request)
    {
        $user = User::find(Auth::id());

        if ($user->otp_code === $request->otp && $user->otp_expiration >= Carbon::now()) {
            $user->otp_code = null;
            $user->otp_expiration = null;
            $user->save();

            return redirect()->route('home')->with('success', 'Login berhasil');
        }

        return back()->withErrors(['otp' => 'Kode OTP salah atau sudah kedaluwarsa']);
    }


    
}

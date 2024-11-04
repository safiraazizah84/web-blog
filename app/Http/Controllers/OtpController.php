<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Otp;
use App\Models\User;
use App\Mail\OtpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OtpController extends Controller
{
    // Kirim OTP ke email pengguna
    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Hapus OTP lama untuk email ini
        Otp::where('email', $request->email)->delete();

        // Buat OTP baru
        $otp = rand(100000, 999999); // 6-digit OTP
        $otpData = Otp::create([
            'email' => $request->email,
            'otp' => $otp,
            'expires_at' => Carbon::now()->addMinutes(10), // OTP berlaku 10 menit
        ]);

        // Kirim OTP melalui email
        Mail::to($request->email)->send(new OtpMail($otp)); // Buat mail view OtpMail

        return redirect()->route('verify.otp.form')->with('message', 'OTP sent to your email.');
    }

    // Verifikasi OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6',
        ]);

        $otpData = Otp::where('email', $request->email)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', Carbon::now())
            ->where('is_used', false)
            ->first();

        if ($otpData) {
            $otpData->update(['is_used' => true]);
            return redirect()->route('dashboard')->with('message', 'Email verified successfully.');
        } else {
            return redirect()->back()->with('error', 'Invalid or expired OTP.');
        }
    }
}

<?php

namespace App\Http\Controllers;

use id;
use Carbon\Carbon;
use App\Models\Otp;
use App\Models\User;
use App\Mail\OtpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OtpController extends Controller
{
   
    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        
        Otp::where('email', $request->email)->delete();

        
        $otp = rand(100000, 999999);
        $otpData = Otp::create([
            'email' => $request->email,
            'otp' => $otp,
            'expires_at' => Carbon::now()->addMinutes(10), 
        ]);

        
        Mail::to($request->email)->send(new OtpMail($otp)); 

        return redirect()->route('verify.otp.form')->with('message', 'OTP sent to your email.');
    }

    
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

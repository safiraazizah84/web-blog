<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;



class VerificationController extends Controller
{
    
    public function verify(Request $request, $id, $hash)
    {
        $user = User::findOrFail($id);

        // Cek apakah hash yang diberikan sesuai
        if (!hash_equals(sha1($user->email), $hash)) {
            return redirect('/login')->withErrors(['msg' => 'Invalid verification link.']);
        }

        // Tandai email sebagai terverifikasi
        $user->email_verified_at = now();
        $user->save();

        return redirect('/login')->with('message', 'Email successfully verified!');
    }

    public function resend(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $verificationUrl = URL::temporarySignedRoute(
                'verification.verify',
                now()->addMinutes(60),
                ['id' => $user->id, 'hash' => sha1($user->email)]
            );

            Mail::to($user->email)->send(new VerificationEmail($user->name, $verificationUrl));

            return back()->with('message', 'Verification email sent!');
        }

        return back()->withErrors(['email' => 'No user found with this email address.']);
    }

   
    public function send(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }

}

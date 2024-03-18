<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{

    public function showLinkRequestForm()
    {
        return view('passwords.new');
    }
    public function sendResetLinkEmail(Request $request)
    {

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->route('password.request')->with('error', 'Email not found.');
        }

        $passwordReset = PasswordReset::where('email', $request->email)->get();
        if ($passwordReset->count() > 0) {
            $passwordReset->each()->delet();
        }

        $token = Str::random(64);
        PasswordReset::create([
            'email' => $user->email,
            'token' => $token,
            'created_at' => now(),

        ]);
        Mail::send('emails.password_reset_email', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });

        return redirect()->route('password.request')->with('success', 'We have e-mailed your password reset link!');
    }

    public function showResetForm($token)
    {
        $passwordReset = PasswordReset::where('token', $token)->first();
        if (!$passwordReset) {
            return redirect()->route('password.request')->with('error', 'Invalid token!');
        }
        return view('passwords.reset', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $passwordReset = PasswordReset::where('token', $request->token)->first();
        $user = User::where('email', $passwordReset->email)->first();
        $password = Hash::make($request->password);
        $user->update(['password' => $password]);
        $passwordReset->delete();
        $user->save();
        return redirect()->route('login.show')->with('success', 'Your password has been reset.');
    }
}

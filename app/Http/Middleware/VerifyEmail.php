<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user && !$user->email_verified_at) {
            auth()->logout();
            return redirect()->route('home')
                    ->with('message', 'You need to confirm your account. We have sent you an activation code, please check your email.');
        }

        return $next($request);
    }
}

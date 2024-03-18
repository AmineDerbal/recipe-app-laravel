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
        if (!$user)
            return redirect()->route('login.show')->with('notice', 'You need to login or register first');

        if ($user && !$user->email_verified_at) {
            return redirect()->route('login.show')
                ->with(['email_verification' => 'You need to confirm your account first']);
        }

        return $next($request);
    }
}

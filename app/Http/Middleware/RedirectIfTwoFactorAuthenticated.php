<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfTwoFactorAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::find(Auth::id());
        // Check if 2FA is enabled and if the user has not been verified
        if ($user && $user->two_factor_secret && $user->two_factor_confirmed_at && !$request->session()->has('2fa_verified')) {
            return redirect()->route('auth.two-factor-authentication.verify');
        }
        return $next($request);
    }
}

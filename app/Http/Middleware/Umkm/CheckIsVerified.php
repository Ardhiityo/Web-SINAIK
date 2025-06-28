<?php

namespace App\Http\Middleware\Umkm;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user->umkm->is_verified) {
            return redirect()->route('umkm.verifications.index')->withError('Akun belum terverifikasi');
        }
        return $next($request);
    }
}

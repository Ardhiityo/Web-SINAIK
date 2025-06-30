<?php

namespace App\Http\Middleware\Umkm;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIsUmkm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->hasRole(['admin_lp', 'admin_astra', 'admin_ico'])) {
            return redirect()->route('link-productive.dashboard');
        }
        return $next($request);
    }
}

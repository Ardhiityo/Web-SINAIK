<?php

namespace App\Http\Middleware\Umkm;

use App\Services\Interfaces\Umkm\BiodataInterface;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckBiodata
{
    public function __construct(private BiodataInterface $biodataRepository) {}

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$this->biodataRepository->checkBiodata($user->umkm->id)) {
            return redirect()->route('umkm.biodatas.create')->withInfo('Isi biodata dahulu');
        }
        return $next($request);
    }
}

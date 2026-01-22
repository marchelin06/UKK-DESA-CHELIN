<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckProfileComplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika user sudah login dan role adalah warga
        if (Auth::check() && Auth::user()->role == 'warga') {
            // Jika NIK atau No HP belum diisi, arahkan ke profile edit
            if ((Auth::user()->nik == null || Auth::user()->nik == '') || 
                (Auth::user()->no_hp == null || Auth::user()->no_hp == '')) {
                
                // Jika bukan di halaman profile edit, redirect
                if (!$request->routeIs('profile.edit', 'profile.update', 'profile.show')) {
                    return redirect()->route('profile.edit')
                        ->with('warning', 'Silakan lengkapi data diri Anda terlebih dahulu.');
                }
            }
        }

        return $next($request);
    }
}

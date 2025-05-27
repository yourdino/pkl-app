<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectBasedOnRole
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            if (auth()->user()->hasRole('admin')) {
                return redirect('/admin');
            } elseif (auth()->user()->hasAnyRole(['siswa', 'guru'])) {
                return redirect('/dashboard');
            }
        }

        return $next($request); // Jika tidak ada role, lanjutkan saja
    }
}

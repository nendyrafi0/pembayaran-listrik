<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role === 'super admin') {
            return $next($request);
        }

        abort(403, 'Akses ditolak. Halaman ini hanya untuk Super Admin.');
    }
}

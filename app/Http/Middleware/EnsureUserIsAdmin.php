<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
   public function handle(Request $request, Closure $next): Response
{
    // Blok ini yang mencegat mahasiswa!
    if (! $request->user()->isAdmin()) {
        abort(403, 'Halaman ini khusus admin.');
    }

    return $next($request); // lolos pemeriksaan, lanjut ke controller
}
}

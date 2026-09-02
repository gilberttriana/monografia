<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureClient
{
    public function handle(Request $request, Closure $next): Response
    {
        abort_unless(strtolower(trim((string) $request->user()?->role)) === 'client', 403);

        return $next($request);
    }
}

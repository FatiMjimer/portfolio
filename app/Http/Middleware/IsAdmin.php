<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->email !== 'admin@admin.com') {
            abort(403, 'Accès interdit.');
        }

        return $next($request);
    }
}

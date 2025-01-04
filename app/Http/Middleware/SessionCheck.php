<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\SessionManager;

class SessionCheck
{
    public function handle($request, Closure $next)
    {
        $sessionManager = new SessionManager();

        if (!$sessionManager->isLoggedIn()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}

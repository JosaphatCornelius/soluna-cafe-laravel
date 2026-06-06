<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCmsRole
{
    /**
     * Allow CMS access to any user holding a CMS role (admin or view-only user).
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if (!$user || (!$user->isAdmin() && !$user->isUser())) {
            abort(403, 'Unauthorized. CMS access required.');
        }

        return $next($request);
    }
}

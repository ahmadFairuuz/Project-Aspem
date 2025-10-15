<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleAccess
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$rolesDeny
    ) {
        $user = Auth::user();

        if ($user && in_array($user->role, $rolesDeny)) {
            abort(404);
        }

        return $next($request);
    }
}

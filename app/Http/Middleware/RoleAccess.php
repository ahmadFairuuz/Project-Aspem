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
    public function handle(Request $request, Closure $next, $rolesDeny)
    {
        $user = Auth::user();

        // Ubah string parameter jadi array (pisahkan dengan koma)
        $roles = is_array($rolesDeny) ? $rolesDeny : explode(',', $rolesDeny);

        if ($user && in_array($user->role, $roles)) {
            abort(404);
        }

        return $next($request);
    }
}

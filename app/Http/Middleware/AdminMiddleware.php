<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\UserRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        try {
            $user_role = UserRole::where('user_id', $user->id)->first();
            $role = Role::where('id', $user_role->role_id)->first();
            if ($role->name !== 'Adminstrator') {
                return redirect()->back();
            }
            return $next($request);
        } catch (\Throwable $th) {
            return $next($request);
        }
    }
}

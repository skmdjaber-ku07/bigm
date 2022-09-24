<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthByType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  String $type
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $type = null)
    {
        // If not authenticated user or the auth user's type doesn't match.
        if (auth()->guest() || auth()->user()->type !== $type) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                if (auth()->check()) {
                    auth()->logout();
                }

                return redirect()->route('login');
            }
        }

        return $next($request);
    }
}

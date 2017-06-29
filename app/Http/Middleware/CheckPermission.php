<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $user_type_id)
    {
        if ($request->user()->user_type_id > $user_type_id) {
            return abort(401);
        }
        return $next($request);
    }
}

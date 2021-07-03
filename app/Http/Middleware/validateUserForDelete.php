<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class validateUserForDelete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(is_object($request->post)) {
            if(! ( ($request->post->user_id == auth()->id()) ||  auth()->user()->isAdmin())) {
                return redirect(abort(401));
            }
        }
        return $next($request);
    }
}

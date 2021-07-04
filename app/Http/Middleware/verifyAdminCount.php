<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class verifyAdminCount
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
        if(!(User::adminCount() > 1)) {
            session()->flash('error', 'Minimum one ADMIN must exist.');
            return redirect(route('users.index'));
        }
        return $next($request);
    }
}

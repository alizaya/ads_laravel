<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RedirectPolicy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user=Auth::id();
        $user=Auth::user()->where('id',$user)->value('access_level');
        if($user==="user")
        {
            return redirect('/user')->with('warning','شما به این صفحه دسترسی ندارید !');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminsOnly
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
        // auth()->user()? ==> optional
        // auth()->user()?  ==> Check if the user authenticated , the check his username
        // if not authenticated or username not equal , then abort him
        abort_if(auth()->user()?->username != '3bod' , Response::HTTP_FORBIDDEN);
        return $next($request);
    }
}

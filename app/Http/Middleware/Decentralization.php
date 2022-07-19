<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Decentralization
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
        if (auth()->user()->level == 0)
        {
            if (request()->segment(1) != 'admin') {
                  abort('403');
            }
        }
        if (auth()->user()->level == 1)
        {
            if (request()->segment(1) != 'company') {
               abort('403');
            }
        }
        if (auth()->user()->level == 2)
        {
            if (request()->segment(1) != 'store') {
               abort('403');
            }
        }
        return $next($request);
    }
}

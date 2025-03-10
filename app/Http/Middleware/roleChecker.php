<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class roleChecker
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
        if (session()->has('user_id')) {
            if (session()->get('user_id')['role'] != 'admin') {
                return redirect()->back();
            } else {
                return $next($request);
            }
        }
        return redirect('/');

    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class SuperAdmin
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
        if (Auth::check()) {
            if (Auth::user()->is_super_admin) {
                return $next($request);
            } else {
                $request->session()->flash('message', "Failed");
                return redirect('/dashboard');
            }
        } else {
            $request->session()->flash('message', "Login required");
            return redirect('/login');
        }
    }
}

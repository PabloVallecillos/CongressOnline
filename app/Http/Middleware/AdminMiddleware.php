<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
         $user = \Illuminate\Support\Facades\Auth::user();
        if($user === null || $user->email !== 'vallecillostyler2@gmail.com'){  // entonces no es admin
            return redirect(url('/'));
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class BasicMiddleware
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
        // pasos previos
        $request['dato'] = 'simple';
        return $next($request); // llamada al método del controller al que nosotros vamos a llegar, next metodo del controllador al que yo estoy llamando
    }
}

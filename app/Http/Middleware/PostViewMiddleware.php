<?php

namespace App\Http\Middleware;

use Closure;

class PostViewMiddleware
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
        $request['dato1'] = 'algo';
        view()->share('dato2','mas'); // agregarle a la vista otro datos mas sin pasar por el controlador
        $response =  $next($request);  // ejecuta controllador

        $texto = $response->getOriginalContent();
        if(strpos($texto, 'sex') !== false){
            return redirect(url('/'));
        }
//        $response->setContent($texto . 'fin');
        return $response;
    }
}

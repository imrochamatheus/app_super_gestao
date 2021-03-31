<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
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
        //return $next($request);
        //verifica se o usuário tem acesso a rota
        if(false){
            return $next($request);
        }else{
            return response('Acesso negado! Rota exige autenticação!!!');
        }
        
    }
}

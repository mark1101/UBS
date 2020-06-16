<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RecadoRoute
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
        if (Auth::user()->funcao == "Medicina" || Auth::user()->funcao == "Enfermagem" || Auth::user()->funcao == "Recepcao") {
            return $next($request);
        }else{
            return redirect()->back();
        }
    }
}

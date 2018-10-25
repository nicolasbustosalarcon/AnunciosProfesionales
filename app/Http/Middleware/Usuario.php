<?php

namespace AnunciosProfesionales\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Session;
use Closure;

class Usuario
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
        return $next($request);
    }
}

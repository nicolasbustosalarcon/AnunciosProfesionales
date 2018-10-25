<?php

namespace AnunciosProfesionales\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Session;
use Closure;
class Secretaria
{
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        switch ($this->auth->user()->tipo_usuario) {
            case '0':
                # Usuario
                #return redirect()->to('usuario');
                break;
            case '1':
                # Secretaria
                #return redirect()->to('secretaria');
                break;
            case '2':
                # Administrador
                return redirect()->to('administrador');
                break;
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use App\Operador;
use DB;
class CheckOperadorCredentialsMiddleware
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
        if (Operador::where('username', '=', $request->get('operador_username'))->exists())
        {
            $op = Operador::where('username', '=', $request->get('operador_username'))->first();
            if (password_verify($request->get('operador_password'), $op->password))
                return $next($request);
            else
                return \Redirect::back()->witherrors('Usuário ou senha incorretos');
        }
        else
            return \Redirect::back()->witherrors('Usuário ou senha incorretos');


    }
}

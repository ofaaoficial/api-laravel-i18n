<?php

namespace App\Http\Middleware;

use Closure;

class RequestIsTypeJson
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
        if(!$request->isJson()) return response()->json(['message' => 'Tipo de solucitud incorrecta.'], 406);
        return $next($request);
    }
}

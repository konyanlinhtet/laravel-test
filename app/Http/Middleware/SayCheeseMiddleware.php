<?php

namespace App\Http\Middleware;

use dump;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SayCheeseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        dump("cheese");
        return $next($request);

    }
    public function terminate(Request $request, Response $response){
        // dump("End");
    }
}

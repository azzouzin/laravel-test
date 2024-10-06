<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsADHUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $name = $request->route('name');
        if ($name != 'ADH') {
            return response()->json(['message' => 'Sajil Dokhol ' . $request->route('name')], 401);
        }
        return $next($request);
    }
}

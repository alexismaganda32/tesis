<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Closure;

class VerifyAccessKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /*
        * API KEY
        * api_key_access
        */
        $key = $request->header('api_key_access');
        if (isset($key) && $key == env('API_KEY_ACCESS')) {
            return $next($request);
        } else {
            return response()->json(['error' => 'unauthorized', 'key'=>env('API_KEY_ACCESS') ], 401);
        }
        
    }
}

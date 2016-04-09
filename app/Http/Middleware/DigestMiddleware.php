<?php

namespace App\Http\Middleware;

use Closure;
use Intervention\Httpauth\Httpauth;

class DigestMiddleware
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
        $config = array(
            'username' => 'admin', 
            'password' => '1234'
        );
        
        Httpauth::make($config)->secure();

        return $next($request);
    }
}
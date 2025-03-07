<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContentSecurityPolicyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // CSP ヘッダーを設定
        $cspHeader = "
        default-src 'self'; 
        script-src 'self' 'unsafe-inline' http://localhost:5173 http://[::1]:5173; 
        style-src 'self' http://localhost:5173 https://fonts.bunny.net; 
        style-src-elem 'self' http://localhost:5173; 
        font-src 'self' data: https://fonts.bunny.net; 
        connect-src 'self' ws://localhost:5173; 
        img-src 'self' data:;
    ";

        // CSP ヘッダーを設定
        $response->headers->set('Content-Security-Policy', preg_replace('/\s+/', ' ', $cspHeader));

        return $response;
    }
}

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

        if (config('app.env') === 'local') {
            $nonce = base64_encode(random_bytes(16)); // 16バイトのランダムな nonce を生成
            $csp = "default-src 'self'; "
                . "style-src 'self' http://localhost:5175 'nonce-{$nonce}' https://fonts.bunny.net; "
                . "font-src 'self' https://fonts.bunny.net data:;";
            $response->headers->set('Content-Security-Policy', $csp);
            $response->headers->set('X-Content-Security-Policy', $csp); // 一部のブラウザ用
        }

        return $response;
    }
}

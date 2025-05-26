<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;

class SecureCookies
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $cookies = $response->headers->getCookies();

        $response->headers->remove('Set-Cookie');

        foreach ($cookies as $cookie) {
            // Recrée le cookie avec HttpOnly et Secure = true
            $secureCookie = new Cookie(
                $cookie->getName(),
                $cookie->getValue(),
                $cookie->getExpiresTime(),
                $cookie->getPath(),
                $cookie->getDomain(),
                true,       // Secure
                true,       // HttpOnly
                false,
                $cookie->getSameSite()
            );

            $response->headers->setCookie($secureCookie);
        }

        return $response;
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PageSpeedOptimization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Ensure the response is valid HTML
        if ($response instanceof Response && strpos($response->headers->get('Content-Type'), 'text/html') !== false) {
            $output = $response->getContent();


            // Optimize HTML by removing unnecessary spaces, comments, and quotes
            $output = preg_replace([
                '/<!--(.*?)-->/s',  // Remove HTML comments
                '/\>[^\S ]+/s',     // Remove whitespace after tags
                '/[^\S ]+\</s',     // Remove whitespace before tags
                '/\s{2,}/s'         // Collapse multiple spaces
            ], [
                '',
                '>',
                '<',
                ' '
            ], $output);

            // Update the response content with the optimized HTML
            $response->headers->set('Content-Length', strlen($output));
            $response->headers->set('Content-Type', 'text/html');
            $response->headers->set('X-Content-Type-Options', 'nosniff');
            $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
            $response->headers->set('X-XSS-Protection', '1; mode=block');
            $response->headers->set('X-Content-Security-Policy', "default-src 'self'");
            $response->headers->set('X-Permitted-Cross-Domain-Policies', 'none');
            $response->headers->set('Referrer-Policy', 'no-referrer');
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
            $response->headers->set('Content-Security-Policy', "default-src 'self'");
            $response->headers->set('X-Content-Type-Options', 'nosniff');
            $response->headers->set('X-Frame-Options', 'SAMEORIGIN');

            $response->setContent($output);
        } else {
            // Ensure the response has a valid Content-Length header
            $response->headers->set('Content-Length', strlen($response->getContent()));
        }

        return $response;
    }
}

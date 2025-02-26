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

        if ($response instanceof Response && $response->headers->get('Content-Type') === 'text/html; charset=UTF-8') {
            $output = $response->getContent();

            // Optimize HTML by removing unnecessary spaces, comments, and quotes
            $output = preg_replace([
                '/<!--(.*?)-->/s',  // Remove HTML comments
                '/\>[^\S ]+/s',     // Remove whitespace after tags
                '/[^\S ]+\</s',     // Remove whitespace before tags
                '/\s+/s'            // Collapse multiple spaces
            ], [
                '',
                '>',
                '<',
                ' '
            ], $output);

            $response->setContent($output);
        }

        return $response;
    }
}

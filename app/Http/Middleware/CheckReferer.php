<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class CheckReferer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // URL yang diizinkan
        $allowedReferer = [
            URL::to('/'),
            URL::to('/pdb'),
        ];
        
        $referer = $request->headers->get('referer');
        
        if (!$referer || !in_array($referer, $allowedReferer)) 
        {
            return redirect('/');
        }
        
        return $next($request);
    }
}

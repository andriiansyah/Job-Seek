<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class Penjual
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        // dd(Auth::user());
        if (Auth::user() == null) {
            // return $response->redirect()->route('login')->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            // ->header('Pragma', 'no-cache')
            // ->header('Expires', '0');
            return redirect()->route('login');
        }

        if (Auth::user()->hak_akses == 1) {
            return $next($request);
        }

        if (Auth::user()->hak_akses == 2) {
            return redirect()->route('lamaran');
        }
    }
}

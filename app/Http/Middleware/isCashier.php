<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isCashier
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->check() || auth()->user()->role != 'cashier') {
            abort(403);
            // return redirect()->route('dashboard.index')->with('error', 'Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.');
            // return redirect()
        }
        return $next($request);
    }
}

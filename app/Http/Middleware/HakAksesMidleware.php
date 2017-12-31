<?php

namespace App\Http\Middleware;

use Closure;

class HakAksesMidleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$namaRule)
    {
        if (auth()->check() && !auth()->user()->punyaRule($namaRule)) {
          return redirect('dashboard')->withErrors(['Anda tak punya akses untuk mengakses halaman!']);
        }
        return $next($request);
    }
}

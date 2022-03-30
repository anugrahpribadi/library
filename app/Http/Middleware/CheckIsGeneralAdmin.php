<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsGeneralAdmin
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
        // Redirect if user is user for organization
        if (!is_null($request->user()->anggota_id)) {
            $anggota = $request->user()->anggota;
            if (is_null($anggota)) {
                abort(404);
            }

            return redirect()->route('home', $anggota->slug);
        }

        return $next($request);
    }
}

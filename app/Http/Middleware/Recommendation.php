<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Recommendation
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
        $response = $next($request);

        if(! Auth::check())
        {
            $request->session()->flash('recommendation', 'Você pode indicar novos jogos na área de comentários.');
        }

        return $response;
    }
}

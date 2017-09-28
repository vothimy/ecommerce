<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
      $arUser = Auth::user();
      $pq = $arUser->pq;
      
      if(strpos($role, (string)$pq)  === false){
        return redirect('noaccess');
      }
      return $next($request);
    }
}

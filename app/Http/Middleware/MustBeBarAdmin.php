<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MustBeBarAdmin 
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

      if(Auth::user()->user_group_id==3)
      {
        return $next($request);
      }
      if(Auth::user()->user_group_id==2)
      {
        return  redirect()->route('country-admin-dashboard');
      }
      if(Auth::user()->user_group_id==1)
      {
        return redirect()->route('super-admin-dashboard');
      }
     
     abort(404);
    }
}

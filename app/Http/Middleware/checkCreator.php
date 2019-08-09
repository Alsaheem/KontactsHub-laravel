<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class checkCreator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next ,$id )
    {
        $user_id = auth()->user()->id;
        if ( Auth::user()->$id == $user_id){
            return redirect('/');
        }
        return $next($request);
    }
}

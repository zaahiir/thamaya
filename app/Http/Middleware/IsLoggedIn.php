<?php

namespace App\Http\Middleware;

use App\Models\PageAccessMaster;
use Closure;
use Illuminate\Http\Request;

class IsLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // dd($request->session()->get('user_id'));
        if ($request->session()->get('user_id') == null) {
            return redirect('/');
        }
        return $next($request);
    }
}

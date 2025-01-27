<?php

namespace App\Http\Middleware;

use App\Helpers\PageAccessHelper;
use Closure;
use Illuminate\Http\Request;

class CheckPageAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $page
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $page)
    {
        if (!PageAccessHelper::checkPageAccess($page, $request)) {
            return redirect('/');
        }

        return $next($request);
    }
}

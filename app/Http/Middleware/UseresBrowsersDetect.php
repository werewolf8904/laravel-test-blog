<?php

namespace App\Http\Middleware;

use Closure;
use hisorange\BrowserDetect\Facade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UseresBrowsersDetect
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        DB::table('users_browsers')->insertOrIgnore([
            'id' => Session::getId(),
            'user_agent' => Facade::browserFamily()
        ]);
        return $next($request);
    }
}

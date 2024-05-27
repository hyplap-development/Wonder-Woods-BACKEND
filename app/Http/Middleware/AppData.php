<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AppData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // get the user id from the request
        $userId = $request->userId;

        // add to config file
        config(['app.userId' => $userId]);

        return $next($request);
    }
}

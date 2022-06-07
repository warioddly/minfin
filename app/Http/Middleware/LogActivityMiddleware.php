<?php

namespace App\Http\Middleware;

use App\Helpers\LogActivity as LogActivityHelper;
use Closure;
use Illuminate\Http\Request;

class LogActivityMiddleware
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
        LogActivityHelper::addToLog();
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class CheckUrl
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
//       $url  = str_replace('"http://www.easyjob.com', '', $request->url());
//       if($request->getRequestUri() != '/' ) return redirect('http://78fd98bf.ngrok.io'.$request->getRequestUri());
        return $next($request);
    }
}

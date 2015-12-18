<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotAdmin
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
        if(!$request->user()->isAdmin()){
            if($this->request->ajax()){
                return response('Forbidden', 403);
            }
            return redirect()->back()->withMessage('This section is only accessible by administrators!');
        }

        return $next($request);
    }
}

<?php

namespace App\Filters;

use Closure;

class Active
{
    public function handle($request, Closure $next)
    {
        if (! request()->has('active')) {
            return $next($request);
        }

        return $next($request)->where('image_url', '!=', null);
    }
}

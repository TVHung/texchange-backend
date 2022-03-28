<?php

namespace App\QueryFilters;

use Closure;
use Illuminate\Http\Request;
use Str;

class Sort implements Pipe
{
    public function handle($request, Closure $next)
    {
        $filterParam = Str::snake(class_basename($this));

        if ( ! request()->has($filterParam)){
            return $next($request);
        }
        $builder = $next($request);
        return $builder->orderBy('price', request($filterParam));
    }
}
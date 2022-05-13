<?php

namespace App\QueryFilters;

use Closure;
use Illuminate\Http\Request;
use Str;

class Ram implements Pipe
{
    public function handle($request, Closure $next)
    {
        $filterParam = Str::snake(class_basename($this));

        if ( ! request()->has($filterParam)){
            return $next($request);
        }
        $builder = $next($request);
        $value = explode("_", request($filterParam));
        // dd((int)$value[0], (int)$value[1]);  
        return $builder->whereBetween('ram', [(int)$value[0], (int)$value[1]]);
    }
}
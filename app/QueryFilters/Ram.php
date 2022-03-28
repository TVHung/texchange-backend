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
        if(count(config('constants.ram')) <= (int)request($filterParam) || (int)request($filterParam) < 0)
            return false;
        $builder = $next($request);
        $value = explode("_", array_values(config('constants.ram'))[(int)request($filterParam)]);
        // dd(count(config('constants.ram')));  
        return $builder->whereBetween('ram', [(int)$value[0], (int)$value[1]]);
    }
}
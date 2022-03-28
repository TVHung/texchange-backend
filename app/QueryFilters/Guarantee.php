<?php

namespace App\QueryFilters;

use Closure;
use Illuminate\Http\Request;
use Str;

class Guarantee implements Pipe
{
    public function handle($request, Closure $next)
    {
        $filterParam = Str::snake(class_basename($this));

        if ( ! request()->has($filterParam)){
            return $next($request);
        }
        if(count(config('constants.guarantee')) <= (int)request($filterParam) || (int)request($filterParam) < 0)
            return false;
        $builder = $next($request);
        $value = explode("_", array_values(config('constants.guarantee'))[(int)request($filterParam)]);
        // dd((int)$value[0], (int)$value[1]);
        return $builder->whereBetween('guarantee', [(int)$value[0], (int)$value[1]]);
    }
}
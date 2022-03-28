<?php

namespace App\QueryFilters;

use Closure;
use Illuminate\Http\Request;
use Str;

class Storage implements Pipe
{
    public function handle($request, Closure $next)
    {
        $filterParam = Str::snake(class_basename($this));

        if ( ! request()->has($filterParam)){
            return $next($request);
        }
        if(count(config('constants.storage_type')) <= (int)request($filterParam) || (int)request($filterParam) < 0)
            return false;
        $value = explode("_", array_values(config('constants.storage_type'))[(int)request($filterParam)]);
        // dd((int)$value[0], (int)$value[1]);
        $builder = $next($request);
        return $builder->where('status', 'like', '%' . request($filterParam) . '%');
    }
}
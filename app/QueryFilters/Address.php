<?php

namespace App\QueryFilters;

use Closure;
use Illuminate\Http\Request;
use Str;

class Address implements Pipe
{
    public function handle($request, Closure $next)
    {
        $filterParam = Str::snake(class_basename($this));

        if ( ! request()->has($filterParam)){
            return $next($request);
        }
        // dd($filterParam, request($filterParam));
        $builder = $next($request);
        return $builder->where('address', 'ilike', '%' . request($filterParam) . '%');
    }
}
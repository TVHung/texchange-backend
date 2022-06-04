<?php

namespace App\QueryFilters;

use Closure;
use Illuminate\Http\Request;
use Str;

class Search implements Pipe
{
    public function handle($request, Closure $next)
    {
        $filterParam = Str::snake(class_basename($this));

        if ( !request()->has($filterParam)){
            return $next($request);
        }
        $builder = $next($request);
        if(request($filterParam) != "")
            return $builder->where('name', 'ilike', '%' . request($filterParam) . '%'); 
        else return false;
    }
}
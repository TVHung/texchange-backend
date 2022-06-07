<?php

namespace App\QueryFilters;

use Closure;
use Illuminate\Http\Request;
use Str;

class CreateAt implements Pipe
{
    public function handle($request, Closure $next)
    {
        $filterParam = Str::snake(class_basename($this));

        if ( ! request()->has($filterParam)){
            return $next($request);
        }
        $builder = $next($request);
        switch (request($filterParam)) {
            case "1":   // in day
                return $builder->whereDate('created_at', '=', \Carbon\Carbon::today());
                break;
            case "2":  // in week
                return $builder->whereDate('created_at', '>=', \Carbon\Carbon::now()->subWeek());
                break;
            case "3":  // in month
                return $builder->whereDate('created_at', '>=', \Carbon\Carbon::now()->subMonth());
                break;
            default:
                return $builder->get();
                break;
        }
    }
}
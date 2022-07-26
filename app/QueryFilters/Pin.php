<?php

namespace App\QueryFilters;

use Closure;
use Illuminate\Http\Request;
use Str;

class Pin implements Pipe
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
        switch ((int)request('category')) {
            case 1:
                $result = $builder->where(function($query) use($value){
                    foreach($value as $item){
                        $query->orWhereBetween('pin', [(int)$value[0], (int)$value[1]]);
                    }        
                });
                return $result;
                break;
            default:
                return $builder;
                break;
        }
    }
}
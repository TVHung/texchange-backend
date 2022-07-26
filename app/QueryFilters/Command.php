<?php

namespace App\QueryFilters;

use Closure;
use Illuminate\Http\Request;
use Str;

class Command implements Pipe
{
    public function handle($request, Closure $next)
    {
        $filterParam = Str::snake(class_basename($this));

        if ( ! request()->has($filterParam)){
            return $next($request);
        }
        $builder = $next($request);

        $value = explode(".", request($filterParam));
        $result = $builder->where(function($query) use($value){
                            foreach($value as $id){
                                $query->orWhere('command', '=', (int)$id);
                            }        
                        });
        return $result;
    }
}
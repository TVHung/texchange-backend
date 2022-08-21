<?php

namespace App\QueryFilters;

use Closure;
use Illuminate\Http\Request;
use Str;

class Resolution implements Pipe
{
    public function handle($request, Closure $next)
    {
        $filterParam = Str::snake(class_basename($this));

        if ( ! request()->has($filterParam)){
            return $next($request);
        }
        $builder = $next($request);

        $value = explode(".", request($filterParam));
        // dd(request('category'));
        switch ((int)request('category')) {
            case 1:
                $result = $builder->where(function($query) use($value){
                                    foreach($value as $id){
                                        $query->orWhere('resolution', '=', (int)$id);
                                    }        
                                });
                return $result;
                break;
            case 2:
                $result = $builder->where(function($query) use($value){
                                    foreach($value as $id){
                                        $query->orWhere('resolution', '=', (int)$id);
                                    }        
                                });
                return $result;
                break;
            default:
                return $builder;
                break;
        }
        return $builder;
    }
}
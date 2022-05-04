<?php

namespace App\QueryFilters;

use Closure;
use Illuminate\Http\Request;
use Str;

class StorageType implements Pipe
{
    public function handle($request, Closure $next)
    {
        $filterParam = Str::snake(class_basename($this));

        if ( ! request()->has($filterParam)){
            return $next($request);
        }
        // dd(request($filterParam));
        $builder = $next($request);
        $value = explode(".", request($filterParam));
        // dd($value);
        return $builder->where(function($query) use($value){
                        foreach($value as $id){
                            $query->orWhere('storage_type', 'like', $id . '%');
                        }        
                    });
    }
}
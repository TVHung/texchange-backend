<?php

namespace App\QueryFilters;

use Closure;
use Illuminate\Http\Request;
use Str;

class Card implements Pipe
{
    public function handle($request, Closure $next)
    {
        $filterParam = Str::snake(class_basename($this));

        if ( ! request()->has($filterParam)){
            return $next($request);
        }
        $builder = $next($request);
        if((int)request($filterParam) == config('constants.has_card')){
            // dd("co card");
            return $builder->whereNotNull('gpu');
        }
        else {
            // dd("khong co card");
            return $builder->whereNull('gpu');
        }
    }
}
<?php

namespace App\QueryFilters;

use Closure;
use Illuminate\Http\Request;
use Str;

class Video implements Pipe
{
    public function handle($request, Closure $next)
    {
        $filterParam = Str::snake(class_basename($this));

        if ( ! request()->has($filterParam)){ //kiem tra xem có param đó không
            return $next($request);
        }
        $builder = $next($request);
        // dd(request($filterParam));
        if(request($filterParam) == "0")
            return $builder->where('LENGTH(video_url) = 0');
        else 
            return $builder->where('LENGTH(video_url) > 0');
    }
}
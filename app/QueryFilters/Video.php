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
        // dd((int)request($filterParam));
        if((int)request($filterParam) == config('constants.has_video')){
            // dd("khong co video");
            return $builder->whereNotNull('video_url');
        }
        else {
            // dd("co video");
            return $builder->whereNull('video_url');
        }
    }
}
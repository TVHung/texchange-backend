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
        switch ((int)request('category')) {
            case 2:
                if((int)request($filterParam) == config('constants.has_card')){
                    $result = $builder->where('gpu', '!=', 'null')
                                ->where('gpu', '!=', '')
                                ->where('gpu', '!=', null); 
                }else{
                    $result = $builder->orWhere('gpu', '=', 'null')
                                ->orWhere('gpu', '=', '')
                                ->orWhere('gpu', '=', null);
                }
                return $result;
                break;
            case 3:
                if((int)request($filterParam) == config('constants.has_card')){
                    $result = $builder->where('gpu', '!=', 'null')
                                ->where('gpu', '!=', '')
                                ->where('gpu', '!=', null); 
                }else{
                    $result = $builder->orWhere('gpu', '=', 'null')
                                ->orWhere('gpu', '=', '')
                                ->orWhere('gpu', '=', null);
                }
                return $result;
                break;
            default:
                return $builder;
                break;
        }
    }
}
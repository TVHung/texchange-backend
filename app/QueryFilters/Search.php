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
        $builder = $next($request);
        switch ((int)request('category')) {
            case 1:
                $builder = $builder->join('product_mobiles', 'products.id', '=', 'product_mobiles.product_id');
                break;
            case 2:
                $builder = $builder->join('product_laptops', 'products.id', '=', 'product_laptops.product_id');
                break;
            case 3:
                $builder = $builder->join('product_pcs', 'products.id', '=', 'product_pcs.product_id');
                break;
        }
        if ( !request()->has($filterParam)){
            return $next($request);
        }
        if(request($filterParam) != "")
            return $builder->where('name', 'ilike', '%' . request($filterParam) . '%');
                            // ->orWhere('title', 'ilike', '%'.request($filterParam) . '%')
                            // ->orWhere('description', 'ilike', '%'.request($filterParam) . '%'); 
        else return $builder;
    }
}
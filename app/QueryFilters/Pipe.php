<?php

namespace App\QueryFilters;

use Closure;

interface Pipe
{
    public function handle($request, Closure $next);
}
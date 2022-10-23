<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

interface FilterInterface{
    public function filter($request, Builder $query);
}
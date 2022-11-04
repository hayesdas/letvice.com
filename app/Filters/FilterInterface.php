<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

interface FilterInterface{
    public static function filter($request, $query);
    public static function view();
}
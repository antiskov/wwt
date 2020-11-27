<?php

namespace App\Domain\Filters;

use App\Contracts\Filter;
use Illuminate\Http\Request;

class WatchFilter extends BaseFilter
{
    protected $query = '1';
}

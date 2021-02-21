<?php

namespace App\Domain\Filters;

use App\Contracts\Filter;
use Illuminate\Http\Request;

class MainPageFilter extends BaseFilter
{
    protected $query = '1 and vip_status in (1)';
}

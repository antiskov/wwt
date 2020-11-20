<?php

namespace App\Domain;

use App\Contracts\Filter;
use Illuminate\Http\Request;

class FilterDirector
{
    protected $query;

    public function createQueryWatchFilter(Request $request, Filter $filter)
    {
        $filter->make($request);
        $this->query = $filter->getQuery();
    }

    public function getQuery()
    {
        return $this->query;
    }
}

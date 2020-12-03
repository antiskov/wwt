<?php

namespace App\Domain;

use App\Contracts\Filter;
use Illuminate\Http\Request;

class FilterDirector
{
    protected $query;
    protected $bindsArr;

    public function createQueryWatchFilter(Request $request, Filter $filter)
    {
        $filter->make($request);
        $this->query = $filter->getQuery();
        $this->bindsArr = $filter->getBindsArr();
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function getBindsArr()
    {
        return$this->bindsArr;
    }
}

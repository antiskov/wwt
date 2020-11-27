<?php

namespace App\Domain;

use App\Domain\Filters\WatchFilter;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;

class ToolsForAdvertsFilters
{
    public function paginateCustom($thisPaginate, $path, $perPage = 15, $columns = ['*'], $pageName = 'page', $page = null)
    {
        $page = $page ?: Paginator::resolveCurrentPage($pageName);

        $total = $thisPaginate->getCountForPagination();

        $results = $total ? $thisPaginate->forPage($page, $perPage)->get($columns) : collect();
        return new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => $path,
        ]);
    }

    public function getFilter(Request $request)
    {
        $watchFilter = new WatchFilter();
        $director = new FilterDirector();
        $director->createQueryWatchFilter($request, $watchFilter);
        $query = $director->getQuery();

        return $query;
    }

    public function getCountPagination()
    {
        if(!isset($_COOKIE["countPagination"])) {
            return $_COOKIE["countPagination"] = 50;
        } elseif($_COOKIE["countPagination"] == 'count_results') {
            return $_COOKIE["countPagination"] = 50;
        } else {
            return $_COOKIE["countPagination"];
        }
    }

    public function getConditionUserId($user_id)
    {
        if($user_id == 0) {
            return '1';
        } else {
            return "user_id in ($user_id)";
        }
    }

    public function setSearchLink(Request $request)
    {
        if(strstr($request->fullUrl(), '?')){
            Session::put('searchLink', strstr($request->fullUrl(), '?'));
        }
    }

    public function getOrderBy(Request $request)
    {
        if($request->orderBy == 'dear') {
            return  'desc';
        } else {
            return  'asc';
        }
    }

    public function setStateNew(Request $request)
    {
        if(($request->states[0] == 'new' && !isset($request->states[1])) || ($request->states[0] == 'new' && $request->states[0] == $request->states[1])) {
            $stateNew = 1;
        } else {
            $stateNew = 2;
        }

        return $stateNew;
    }
}

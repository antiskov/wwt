<?php

namespace App\Services;

use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class CustomPaginateService
{
    public function paginate($perPage = 15, $path = 'none', $page = null, $columns = ['*'], $pageName = 'page')
    {
        $page = $page ?: Paginator::resolveCurrentPage($pageName);


        $total = $this->getCountForPagination();

        $results = $total ? $this->forPage($page, $perPage)->get($columns) : collect();
//        dd(Paginator::resolveCurrentPath());

        if($path != 'none') {
            return $this->paginator($results, $total, $perPage, $page, [
                'path' => $path,
                'pageName' => $pageName,
            ]);
        }

        return $this->paginator($results, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => $pageName,
        ]);
    }

    public function paginateArray($data, $perPage = 15, $path = 'none')
    {
//        $data->get();
//        $data->toArray();
        $page = Paginator::resolveCurrentPage();
//        $total = count($data);
        $total = $data->count();
        $results = array_slice($data, ($page - 1) * $perPage, $perPage);

        if($path != 'none') {
            return new LengthAwarePaginator($results, $total, $perPage, $page, [
                'path' => $path,
            ]);
        }

        return new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
        ]);
    }

    public function thisPaginate($thisPaginate, $perPage = 15, $path = 'none')
    {
//        dd($thisPaginate);
//        dd($path);
//        return  $thisPaginate->paginate($perPage, $path);
        return  $this->paginateArray($thisPaginate, $perPage, $path);
//        dd($thisPaginate);
    }
}


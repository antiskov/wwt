<?php


namespace App\Contracts;

use Illuminate\Http\Request;

interface CustomPagination
{
    public function paginateCustom($thisPaginate, $path, $perPage = 15, $columns = ['*'], $pageName = 'page', $page = null);
}

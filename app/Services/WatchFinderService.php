<?php


namespace App\Services;


use App\Models\WatchModel;
use Illuminate\Support\Collection;


class WatchFinderService
{
    public function find(string $term)
    {
        return WatchModel::where('model_code','like', '%' . $term . '%')->orWhere('title','like', '%' . $term . '%')->get();
    }

    public function getWatchById(int $id )
    {
        return WatchModel::find($id);
    }
}

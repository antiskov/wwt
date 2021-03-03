<?php

namespace App\Contracts;

use App\DataObjects\WatchEntity;

interface AdvertCreator
{
    /**
     * @param WatchEntity $watch
     * @return mixed
     */
    public function create(WatchEntity $watch);
}

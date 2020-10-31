<?php

namespace App\Contracts;

use App\DataObjects\WatchEntity;

interface AdvertCreator
{
    public function create(WatchEntity $watch);
}

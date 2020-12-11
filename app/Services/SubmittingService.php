<?php

namespace App\Services;

use App\Domain\Submitting\Advert\AdvertAbstract;
use App\Domain\Submitting\Init\AbstractSubmitting;
use App\Models\Advert;

class SubmittingService
{
    public function getInfoForStep1(AbstractSubmitting $submitting): array
    {
        return $submitting->get();
    }

    public function createDraft(AdvertAbstract $submitting):Advert
    {
        return $submitting->get();
    }
}

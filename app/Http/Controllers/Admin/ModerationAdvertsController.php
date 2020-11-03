<?php

namespace App\Http\Controllers\Admin;

use App\DataObjects\Admin\ShowShortAdvert;
use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Services\AdvertsService;

class ModerationAdvertsController extends Controller
{
    public function index(AdvertsService $advertsService)
    {
        $adverts=$advertsService->getAllAdverts();

        return view('admin.pages.moderation_adverts', ['adverts' => $adverts]);
    }

    public function changeStatus($status, Advert $advert, AdvertsService $advertsService)
    {
        $advertsService->changeStatus($status, $advert);

        return redirect()->back();
    }

    public function deleteAdvert(Advert $advert, AdvertsService $advertsService)
    {
        $advertsService->deleteAdvert($advert);

        return redirect()->back();
    }
}

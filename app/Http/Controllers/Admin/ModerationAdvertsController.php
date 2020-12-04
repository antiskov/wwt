<?php

namespace App\Http\Controllers\Admin;

use App\DataObjects\Admin\ShowShortAdvert;
use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Services\AdminService;
use App\Services\AdvertsService;

class ModerationAdvertsController extends Controller
{
    public function index()
    {
        $adverts = Advert::paginate(30);

        return view('admin.pages.moderation_adverts', ['adverts' => $adverts]);
    }

    public function changeStatus($status, Advert $advert, AdminService $advertsService)
    {
        $advertsService->changeStatus($status, $advert);

        return redirect()->route('admin.moderation_adverts');
    }

    public function deleteAdvert(Advert $advert, AdminService $advertsService)
    {
        $advertsService->deleteAdvert($advert);

        return redirect()->route('admin.moderation_adverts');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\DataObjects\Admin\ShowShortAdvert;
use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\Status;
use App\Services\AdminService;
use App\Services\AdvertsService;
use App\Services\WatchModelService;

class ModerationAdvertsController extends Controller
{
    public function index()
    {
        $adverts = Advert::orderBy('status_id', 'desc')->orderBy('vip_status', 'desc')->paginate(30);

        return view('admin.pages.moderation_adverts', ['adverts' => $adverts]);
    }

    public function changeStatus(Status $status, Advert $advert, AdminService $advertsService, WatchModelService $modelService)
    {
        $advertsService->changeStatus($status, $advert);
        if($status->title == 'published')
        {
            $modelService->updateWatchModel($advert);
            $advertsService->publishedWatchMake($advert);
        }


        return redirect()->route('admin.moderation_adverts');
    }

    public function deleteAdvert(Advert $advert, AdminService $advertsService)
    {
        $advertsService->deleteAdvert($advert);

        return redirect()->route('admin.moderation_adverts');
    }
}

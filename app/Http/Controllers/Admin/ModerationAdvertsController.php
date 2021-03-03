<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\Status;
use App\Services\FixStatusAdvert;
use App\Services\ModerationService;
use App\Services\WatchModelService;

class ModerationAdvertsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        FixStatusAdvert::fix();
        $adverts = Advert::orderBy('status_id', 'asc')->orderBy('vip_status', 'desc')->paginate(30);

        return view('admin.pages.moderation_adverts', [
            'adverts' => $adverts,
            'statuses' => Status::all(),
        ]);
    }

    /**
     * @param Status $status
     * @param Advert $advert
     * @param ModerationService $advertsService
     * @param WatchModelService $modelService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus(Status $status, Advert $advert, ModerationService $advertsService, WatchModelService $modelService)
    {
        $advertsService->changeStatus($status, $advert);
        if($status->title == 'published')
        {
            $modelService->updateWatchModel($advert);
            $advertsService->publishedWatchMake($advert);
        }

        return redirect()->back();
    }

    /**
     * @param Advert $advert
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function deleteAdvert(Advert $advert)
    {
        $advert->delete();

        return redirect()->route('admin.moderation_adverts');
    }
}

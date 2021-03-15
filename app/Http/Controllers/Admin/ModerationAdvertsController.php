<?php

namespace App\Http\Controllers\Admin;

use App\Domain\TransactionCreator;
use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\LimitNotVipAdvert;
use App\Models\ModeratedAdvert;
use App\Models\Price;
use App\Models\Status;
use App\Models\UserCountAdvert;
use App\Models\UserTransaction;
use App\Services\FixStatusAdvert;
use App\Services\ModerationService;
use App\Services\PayService;
use App\Services\WatchModelService;
use Illuminate\Support\Facades\Log;

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
    public function changeStatus(Status $status, Advert $advert, ModerationService $advertsService,
                                 WatchModelService $modelService, PayService $service)
    {
        $advertsService->changeStatus($status, $advert);
        if($status->title == 'published')
        {
            $modelService->updateWatchModel($advert);
            $advertsService->publishedWatchMake($advert);
            $userCountAdvert = UserCountAdvert::where('user_id', $advert->user_id)->first();
            $moderatedAdvert = ModeratedAdvert::where('advert_id', $advert->id)->first();

            if ($userCountAdvert && !$moderatedAdvert){
                $userCountAdvert->adverts_count += 1;
                $userCountAdvert->save();
            } else if (!ModeratedAdvert::where('advert_id', $advert->id)
                ->where('user_id', $advert->user_id)->first()) {
                $userCountAdvert = new UserCountAdvert();
                $userCountAdvert->user_id = $advert->user_id;
                $userCountAdvert->adverts_count = 1;
                $userCountAdvert->save();
            }

            if (!$moderatedAdvert){
                $moderatedAdvert = new ModeratedAdvert();
                $moderatedAdvert->user_id = $advert->user_id;
                $moderatedAdvert->advert_id = $advert->id;
                $moderatedAdvert->save();

                $priceNotVipAdvert = Price::where('title', 'notVip')->first()->value;
                $limit = LimitNotVipAdvert::first()->value;
                if ($service->getScoreUser($advert->user_id) >= $priceNotVipAdvert
                    && $userCountAdvert
                    && $userCountAdvert->adverts_count > $limit) {
                    $order_id = 'buy-advert-' . auth()->user()->id . '-' . rand(1000000, 2000000);
                    $transaction = new TransactionCreator();
                    $price = Price::where('title', 'notVip')->first()->value;
                    $transaction
                        ->additionCostUser($advert->user_id, $price, $order_id,
                            'cost', 'buy advert', 'success' );
                }
            }
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

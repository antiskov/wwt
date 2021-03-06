<?php

namespace App\Http\Controllers;

use App\Domain\Submitting\Advert\AdvertWatchConnector;
use App\Domain\TransactionCreator;
use App\Http\Requests\Submitting\SubmittingRequest;
use App\Http\Requests\Submitting\UploadImageRequest;
use App\Http\Requests\Submitting\WatchAdvertRequest;
use App\Models\Advert;
use App\Models\AdvertPhoto;
use App\Models\LimitNotVipAdvert;
use App\Models\Price;
use App\Models\Status;
use App\Models\UserCountAdvert;
use App\Services\FixStatusAdvert;
use App\Services\PayService;
use App\Services\SubmittingService;
use App\Services\UserService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Validator;

class SubmittingController extends Controller
{
    /**
     * @param SubmittingRequest $request
     * @param SubmittingService $service
     * @param PayService $payService
     * @return Application|Factory|View
     */
    public function index(SubmittingRequest $request, SubmittingService $service, PayService $payService)
    {
        $limit = LimitNotVipAdvert::first();
        $userCountAdvert = UserCountAdvert::where('user_id', auth()->user()->id)->first();
        $price = Price::where('title', 'notVip')->first()->value;
        if (!$userCountAdvert || $userCountAdvert->adverts_count < $limit->value
            || $payService->getScore() > $price){
            return view('submitting.pages.advert', $service->getWatchItemsForFirstStep());
        } else {
            return redirect()->back();
        }


    }

    /**
     * @param WatchAdvertRequest $request
     * @param SubmittingService $service
     * @return RedirectResponse
     */
    public function createDraft(WatchAdvertRequest $request, SubmittingService $service): RedirectResponse
    {

        $advert = $service->createDraft($request);

        return redirect()->route('submitting.get_draft', $advert);
    }

    /**
     * @param Advert $advert
     * @param WatchAdvertRequest $request
     * @param SubmittingService $service
     * @return RedirectResponse
     */
    public function editDraft(Advert $advert, WatchAdvertRequest $request, SubmittingService $service): RedirectResponse
    {
        if ($request->release_year){
            $validator = Validator::make($request->all(), [
                'release_year' => 'numeric',
            ]);

            if($validator->fails()){
                return redirect()->route('submitting.get_draft', $advert);
            }
        }

        if($service->checkChangedAdvertWatch($advert, $request)) {
            $advert = $service->editDraft(new AdvertWatchConnector($request, $advert));

            $advert->status_id = Status::where('title', 'draft')->first()->id;
            $advert->save();
        }

        return redirect()->route('submitting.get_draft', $advert);
    }

    /**
     * @param Advert $advert
     * @param SubmittingService $service
     * @return Application|Factory|View
     */
    public function getDraft(Advert $advert, SubmittingService $service)
    {
        return view('submitting.pages.advert', $service->getDraftWatchItemsForFirstStep($advert));
    }

    public function uploadImage(Advert $advert, UploadImageRequest $request, SubmittingService $service): JsonResponse
    {
        $service->uploadPhoto($advert->id, $advert->type, $request);

        $data = [
            'output' => view('submitting.partials.image_block', ['advert' => $advert])->toHtml(),
        ];

        return response()->json($data);
    }

    /**
     * @param AdvertPhoto $photo
     * @return Application|ResponseFactory|Response
     * @throws Exception
     */
    public function deletePhoto(AdvertPhoto $photo)
    {
        $photo->delete();

        return response('success');
    }

    /**
     * @param PayService $service
     * @param Advert $advert
     * @return RedirectResponse
     */
    public function buyVip(PayService $service, Advert $advert): RedirectResponse
    {
        $price = Price::where('title', 'vip')->first()->value;
        if ($service->getScore() >= $price){
            $service->bayVipStatusFromCost($advert);

            return redirect()->back();
        }
        return redirect()->route('go_to_liqpay', $service->setTransactionForSubmitting($advert));
    }

    /**
     * @param Advert $advert
     * @param SubmittingService $service
     * @param PayService $payService
     * @return RedirectResponse
     */
    public function publish(Advert $advert, SubmittingService $service, PayService $payService): RedirectResponse
    {
        $service->setModerationStatus($advert->id);
        $statusId = Status::where('title', 'moderation')->first()->id;

        FixStatusAdvert::set($advert->id, $statusId);

        $user = auth()->user();
        $role = (new UserService())->getRole($user);

        if ($role->title == 'admin' || $role->title == 'manager'){
            return redirect()->route('admin.moderation_adverts');
        }

        return redirect()->route('my_adverts');
    }

    /**
     * @param Advert $advert
     * @param WatchAdvertRequest $request
     * @param SubmittingService $service
     * @return JsonResponse
     */
    public function getStep4(Advert $advert, WatchAdvertRequest $request, SubmittingService $service): JsonResponse
    {
        $advert = $service->editDraft(new AdvertWatchConnector($request, $advert));

        $data = [
            'output' => view('submitting.partials.step4', [
                'advert' => $advert,
                'price' => $service->getPrice($advert)
            ])->toHtml(),
        ];

        return response()->json($data);
    }
}

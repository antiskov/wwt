<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminDataRequest;
use App\Models\DeliveryVolume;
use App\Models\LimitNotVipAdvert;
use App\Models\MechanismType;
use App\Models\Price;
use App\Models\WatchType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Validator;

class AdminDataController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $infoArr['watchTypes'] = WatchType::all();
        $infoArr['deliveryVolumes'] = DeliveryVolume::all();
        $infoArr['states'] = ['new', 'used'];
        $infoArr['mechanismTypes'] = MechanismType::all();
        $infoArr['limitFreeAdverts'] = LimitNotVipAdvert::first();

        return view('admin.pages.moderation_data', $infoArr);
    }

    /**
     * @param WatchType $watchType
     * @param int $status
     * @return RedirectResponse
     */
    public function changeStatusWatchType(WatchType $watchType, int $status): RedirectResponse
    {
        $watchType->is_active = $status;
        $watchType->save();

        return redirect()->back();
    }

    /**
     * @param WatchType $watchType
     * @return Application|Factory|View
     */
    public function updateWatchTypeIndex(WatchType $watchType)
    {
        return view('admin.pages.update_watch_type', ['watchType' => $watchType]);
    }

    /**
     * @param WatchType $watchType
     * @param AdminDataRequest $request
     * @return RedirectResponse
     */
    public function updateWatchType(WatchType $watchType, AdminDataRequest $request): RedirectResponse
    {
        $watchType->title = $request->name;
        $watchType->save();

        return redirect()->back();
    }

    /**
     * @param AdminDataRequest $request
     * @return RedirectResponse
     */
    public function createWatchType(AdminDataRequest $request): RedirectResponse
    {
        $watchType = new WatchType();
        $watchType->title = $request->name;
        $watchType->save();

        return redirect()->back();
    }

    /**
     * @param WatchType $watchType
     * @return RedirectResponse
     * @throws \Exception
     */
    public function deleteWatchType(WatchType $watchType): RedirectResponse
    {
        $watchType->delete();

        return redirect()->back();
    }

    /**
     * @param MechanismType $mechanismType
     * @param int $status
     * @return RedirectResponse
     */
    public function changeStatusMechanismType(MechanismType $mechanismType, int $status): RedirectResponse
    {
        if ($status != 0 && $status != 1){
            return redirect()->back();
        }

        $mechanismType->is_active = $status;
        $mechanismType->save();

        return redirect()->back();
    }

    /**
     * @param MechanismType $mechanismType
     * @return Application|Factory|View
     */
    public function updateMechanismTypeIndex(MechanismType $mechanismType)
    {
        return view('admin.pages.update_mechanism_type', ['mechanismType' => $mechanismType]);
    }

    /**
     * @param MechanismType $mechanismType
     * @param AdminDataRequest $request
     * @return RedirectResponse
     */
    public function updateMechanismType(MechanismType $mechanismType, AdminDataRequest $request): RedirectResponse
    {
        $mechanismType->title = $request->name;
        $mechanismType->save();

        return redirect()->back();
    }

    /**
     * @param AdminDataRequest $request
     * @return RedirectResponse
     */
    public function createMechanismType(AdminDataRequest $request): RedirectResponse
    {
        $mechanismType = new MechanismType();
        $mechanismType->title = $request->name;
        $mechanismType->save();

        return redirect()->back();
    }

    /**
     * @param DeliveryVolume $deliveryVolume
     * @param int $status
     * @return RedirectResponse
     */
    public function changeStatusDeliveryVolume(DeliveryVolume $deliveryVolume, int $status): RedirectResponse
    {
        if ($status != 0 && $status != 1){
            return redirect()->back();
        }

        $deliveryVolume->is_active = $status;
        $deliveryVolume->save();

        return redirect()->back();
    }

    /**
     * @param DeliveryVolume $deliveryVolume
     * @return Application|Factory|View
     */
    public function updateDeliveryVolumeIndex(DeliveryVolume $deliveryVolume)
    {
        return view('admin.pages.update_delivery_volume', ['deliveryVolume' => $deliveryVolume]);
    }

    /**
     * @param DeliveryVolume $deliveryVolume
     * @param AdminDataRequest $request
     * @return RedirectResponse
     */
    public function updateDeliveryVolume(DeliveryVolume $deliveryVolume, AdminDataRequest $request): RedirectResponse
    {
        $deliveryVolume->title = $request->name;
        $deliveryVolume->save();

        return redirect()->back();
    }

    /**
     * @param AdminDataRequest $request
     * @return RedirectResponse
     */
    public function createDeliveryVolume(AdminDataRequest $request): RedirectResponse
    {
        $deliveryVolume = new DeliveryVolume();
        $deliveryVolume->title = $request->name;
        $deliveryVolume->save();

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function setCountFreeAdverts(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'count_free_adverts' => 'numeric'
        ]);
        if ($validator->fails()){
            return redirect()->back();
        }

        $limit = LimitNotVipAdvert::first();
        if (!$limit){
            $limit = new LimitNotVipAdvert();
        }
        $limit->value = $request->count_free_adverts;
        $limit->save();

        return redirect()->back();

    }

}

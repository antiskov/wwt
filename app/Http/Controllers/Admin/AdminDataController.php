<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminDataRequest;
use App\Models\DeliveryVolume;
use App\Models\LimitNotVipAdvert;
use App\Models\MechanismType;
use App\Models\Price;
use App\Models\WatchType;
use Illuminate\Http\Request;

class AdminDataController extends Controller
{
    public function index()
    {
        $infoArr['watchTypes'] = WatchType::all();
        $infoArr['deliveryVolumes'] = DeliveryVolume::all();
        $infoArr['states'] = ['new', 'used'];
        $infoArr['mechanismTypes'] = MechanismType::all();
        $infoArr['limitFreeAdverts'] = LimitNotVipAdvert::first();

        return view('admin.pages.moderation_data', $infoArr);
    }

    public function changeStatusWatchType(WatchType $watchType, int $status)
    {
        $watchType->is_active = $status;
        $watchType->save();

        return redirect()->back();
    }

    public function updateWatchTypeIndex(WatchType $watchType)
    {
        return view('admin.pages.update_watch_type', ['watchType' => $watchType]);
    }

    public function updateWatchType(WatchType $watchType, AdminDataRequest $request)
    {
        $watchType->title = $request->name;
        $watchType->save();

        return redirect()->back();
    }

    public function createWatchType(AdminDataRequest $request)
    {
        $watchType = new WatchType();
        $watchType->title = $request->name;
        $watchType->save();

        return redirect()->back();
    }

    public function deleteWatchType(WatchType $watchType)
    {
        $watchType->delete();

        return redirect()->back();
    }

    public function changeStatusMechanismType(MechanismType $mechanismType, int $status)
    {
        if ($status != 0 && $status != 1){
            return redirect()->back();
        }

        $mechanismType->is_active = $status;
        $mechanismType->save();

        return redirect()->back();
    }

    public function updateMechanismTypeIndex(MechanismType $mechanismType)
    {
        return view('admin.pages.update_mechanism_type', ['mechanismType' => $mechanismType]);
    }

    public function updateMechanismType(MechanismType $mechanismType, AdminDataRequest $request)
    {
        $mechanismType->title = $request->name;
        $mechanismType->save();

        return redirect()->back();
    }

    public function createMechanismType(AdminDataRequest $request)
    {
        $mechanismType = new MechanismType();
        $mechanismType->title = $request->name;
        $mechanismType->save();

        return redirect()->back();
    }

    public function changeStatusDeliveryVolume(DeliveryVolume $deliveryVolume, int $status)
    {
        if ($status != 0 && $status != 1){
            return redirect()->back();
        }

        $deliveryVolume->is_active = $status;
        $deliveryVolume->save();

        return redirect()->back();
    }

    public function updateDeliveryVolumeIndex(DeliveryVolume $deliveryVolume)
    {
        return view('admin.pages.update_delivery_volume', ['deliveryVolume' => $deliveryVolume]);
    }

    public function updateDeliveryVolume(DeliveryVolume $deliveryVolume, AdminDataRequest $request)
    {
        $deliveryVolume->title = $request->name;
        $deliveryVolume->save();

        return redirect()->back();
    }

    public function createDeliveryVolume(AdminDataRequest $request)
    {
        $deliveryVolume = new DeliveryVolume();
        $deliveryVolume->title = $request->name;
        $deliveryVolume->save();

        return redirect()->back();
    }

    public function setCountFreeAdverts(Request $request)
    {
        $validator = \Validator::make($request->all(), [
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

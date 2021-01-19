<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MechanismType;
use App\Models\WatchType;
use Illuminate\Http\Request;

class AdminDataController extends Controller
{
    public function index()
    {
        $infoArr['watchTypes'] = WatchType::all();
        $infoArr['deliveryVolumes'] = ['with box', 'with original documents', 'with original documents and box'];
        $infoArr['states'] = ['new', 'used'];
        $infoArr['mechanismTypes'] = MechanismType::all();

        return view('admin.pages.moderation_data', $infoArr);
    }

    public function changeStatusWatchType(WatchType $watchType, $status)
    {
        if ($status != 0 && $status != 1){
            return redirect()->back();
        }

        $watchType->is_active = $status;
        $watchType->save();

        return redirect()->back();
    }

    public function updateWatchTypeIndex(WatchType $watchType)
    {
        return view('admin.pages.update_watch_type', ['watchType' => $watchType]);
    }

    public function updateWatchType(WatchType $watchType, Request $request)
    {
        $request->validate(['name' => 'min:1|max:100']);

        $watchType->title = $request->name;
        $watchType->save();

        return redirect()->back();
    }

    public function createWatchType(Request $request)
    {
        $request->validate(['name' => 'min:1|max:100']);

        $watchType = new WatchType();
        $watchType->title = $request->name;
        $watchType->save();

        return redirect()->back();
    }

    public function changeStatusMechanismType(MechanismType $mechanismType, $status)
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

    public function updateMechanismType(MechanismType $mechanismType, Request $request)
    {
        $request->validate(['name' => 'min:1|max:100']);

        $mechanismType->title = $request->name;
        $mechanismType->save();

        return redirect()->back();
    }

    public function createMechanismType(Request $request)
    {
        $request->validate(['name' => 'min:1|max:100']);

        $mechanismType = new MechanismType();
        $mechanismType->title = $request->name;
        $mechanismType->save();

        return redirect()->back();
    }

}

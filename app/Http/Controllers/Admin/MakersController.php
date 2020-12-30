<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MakerRequest;
use App\Models\WatchMake;
use App\Services\WatchMakerService;

class MakersController extends Controller
{
    public function index()
    {
        $watchMakes = WatchMake::where('is_moderated', 1)->get();

        return view('admin.pages.manage_makers', ['makers' => $watchMakes]);
    }

    public function upload(MakerRequest $request, WatchMakerService $service)
    {
        $service->createMaker($request);

        return redirect()->back();
    }

    public function changeStatus(int $status, WatchMake $maker)
    {
        if($status == 1) {
            $maker->status = 1;
        } else {
            $maker->status = 0;
        }
        $maker->save();

        return redirect()->back();
    }
}

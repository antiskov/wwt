<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MakerRequest;
use App\Models\WatchMake;
use App\Services\WatchMakerService;

class MakersController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $watchMakes = WatchMake::where('is_moderated', 1)->get();

        return view('admin.pages.manage_makers', ['makers' => $watchMakes]);
    }

    /**
     * @param MakerRequest $request
     * @param WatchMakerService $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(MakerRequest $request, WatchMakerService $service)
    {
        $service->createMaker($request);

        return redirect()->back();
    }

    /**
     * @param int $status
     * @param WatchMake $maker
     * @return \Illuminate\Http\RedirectResponse
     */
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

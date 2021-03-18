<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MakerRequest;
use App\Models\WatchMake;
use App\Services\WatchMakerService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Validator;

class MakersController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $watchMakes = WatchMake::all();

        return view('admin.pages.manage_makers', ['makers' => $watchMakes]);
    }

    /**
     * @param MakerRequest $request
     * @param WatchMakerService $service
     * @return RedirectResponse
     */
    public function upload(MakerRequest $request, WatchMakerService $service): RedirectResponse
    {
        $service->createMaker($request);

        return redirect()->back();
    }

    /**
     * @param int $status
     * @param WatchMake $maker
     * @return RedirectResponse
     */
    public function changeStatus(int $status, WatchMake $maker): RedirectResponse
    {
        if($status == 1) {
            $maker->status = 1;
        } else {
            $maker->status = 0;
        }
        $maker->save();

        return redirect()->back();
    }

    /**
     * @param WatchMake $maker
     * @return Application|Factory|View
     */
    public function updateMakerIndex(WatchMake $maker)
    {
        return view('admin.pages.update_maker', ['maker' => $maker]);
    }

    /**
     * @param Request $request
     * @param WatchMake $maker
     * @param WatchMakerService $service
     * @return RedirectResponse
     */
    public function updateMaker(Request $request, WatchMake $maker, WatchMakerService $service): RedirectResponse
    {
        $request->validate(['logo' => 'required|image']);
        $service->updateMaker($request, $maker);

        return redirect()->back();
    }

    /**
     * @param $status
     * @param WatchMake $maker
     * @return RedirectResponse
     */
    public function setModeration($status, WatchMake $maker): RedirectResponse
    {
        if ($status != 0 && $status != 1){
            return redirect()->back();
        }

        $maker->is_moderated = $status;
        $maker->save();

        return redirect()->back();
    }
}

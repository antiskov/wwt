<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Services\BannerService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BannerController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $banners = Banner::orderBy('date_start', 'desc')->get();

        return view('admin.pages.banner_control', ['banners' => $banners]);
    }

    /**
     * @param BannerRequest $request
     * @param BannerService $service
     * @return RedirectResponse
     */
    public function createBanner(BannerRequest $request, BannerService $service): RedirectResponse
    {
        $service->createBanner($request);

        return redirect()->back();
    }

    /**
     * @param Banner $banner
     * @return RedirectResponse
     */
    public function closeBanner(Banner $banner): RedirectResponse
    {
        $banner->is_active = 0;
        $banner->save();

        return redirect()->back();
    }

    /**
     * @param Banner $banner
     * @return RedirectResponse
     * @throws Exception
     */
    public function deleteBanner(Banner $banner): RedirectResponse
    {
        $banner->delete();

        return redirect()->back();
    }
}

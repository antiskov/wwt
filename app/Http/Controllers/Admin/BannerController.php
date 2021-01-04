<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Services\BannerService;

class BannerController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $banners = Banner::orderBy('date_start', 'desc')->get();

        return view('admin.pages.banner_control', ['banners' => $banners]);
    }

    /**
     * @param BannerRequest $request
     * @param BannerService $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createBanner(BannerRequest $request, BannerService $service)
    {
        $service->createBanner($request);

        return redirect()->back();
    }

    /**
     * @param Banner $banner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function closeBanner(Banner $banner)
    {
        $banner->is_active = 0;
        $banner->save();

        return redirect()->back();
    }

    /**
     * @param Banner $banner
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function deleteBanner(Banner $banner)
    {
        $banner->delete();

        return redirect()->back();
    }
}

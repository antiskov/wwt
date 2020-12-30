<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Services\AdminService;
use App\Services\BannerService;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('date_start', 'desc')->get();

        return view('admin.pages.banner_control', ['banners' => $banners]);
    }

    public function createBanner(BannerRequest $request, BannerService $service)
    {
        $service->createBanner($request);

        return redirect()->back();
    }

    public function closeBanner(Banner $banner, AdminService $service)
    {
//        $service->closeBanner($banner);

        $banner->is_active = 0;
        $banner->save();

        return redirect()->back();
    }

    public function deleteBanner(Banner $banner, AdminService $service)
    {
//        $service->deleteBanner($banner);
        $banner->delete();

        return redirect()->back();
    }
}

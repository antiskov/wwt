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
        //todo: order by start_date
        $banners = Banner::orderBy('id', 'desc')->get();

        return view('admin.pages.banner_control', ['banners' => $banners]);
    }

    public function createBanner(BannerRequest $request, AdminService $service)
    {
        $service->createBanner($request);

        return redirect()->back();
    }

    public function closeBanner(Banner $banner, AdminService $service)
    {
        $service->closeBanner($banner);

        return redirect()->back();
    }

    public function deleteBanner(Banner $banner, AdminService $service)
    {
        $service->deleteBanner($banner);

        return redirect()->back();
    }
}

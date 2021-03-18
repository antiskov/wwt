<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\HomeSlider;
use App\Services\SliderService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SliderController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        if(HomeSlider::all()) {
            return view('admin.pages.manage_slider', ['sliders' => HomeSlider::all()]);
        } else {
            return view('admin.pages.manage_slider');
        }
    }

    /**
     * @param SliderRequest $request
     * @param SliderService $service
     * @return RedirectResponse
     */
    public function upload(SliderRequest $request, SliderService $service): RedirectResponse
    {
        $service->uploadSlider($request);

        return redirect()->back();
    }

    /**
     * @param HomeSlider $slider
     * @return RedirectResponse
     */
    public function deactivation(HomeSlider $slider): RedirectResponse
    {
        $slider->is_active = 0;
        $slider->save();

        return redirect()->back();
    }

    /**
     * @param HomeSlider $slider
     * @return RedirectResponse
     */
    public function activation(HomeSlider $slider): RedirectResponse
    {
        $slider->is_active = 1;
        $slider->save();

        return redirect()->back();
    }

    /**
     * @param HomeSlider $slider
     * @return RedirectResponse
     * @throws Exception
     */
    public function delete(HomeSlider $slider): RedirectResponse
    {
        $slider->delete();

        return redirect()->back();
    }
}

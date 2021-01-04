<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\HomeSlider;
use App\Services\SliderService;

class SliderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(SliderRequest $request, SliderService $service)
    {
        $service->uploadSlider($request);

        return redirect()->back();
    }

    /**
     * @param HomeSlider $slider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deactivation(HomeSlider $slider)
    {
        $slider->is_active = 0;
        $slider->save();

        return redirect()->back();
    }

    /**
     * @param HomeSlider $slider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activation(HomeSlider $slider)
    {
        $slider->is_active = 1;
        $slider->save();

        return redirect()->back();
    }

    /**
     * @param HomeSlider $slider
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(HomeSlider $slider)
    {
        $slider->delete();

        return redirect()->back();
    }
}

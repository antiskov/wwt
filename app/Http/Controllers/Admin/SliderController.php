<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use App\Services\AdminService;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        if(HomeSlider::all()) {
            return view('admin.pages.manage_slider', ['sliders' => HomeSlider::all()]);
        } else {
            return view('admin.pages.manage_slider');
        }
    }

    public function upload(Request $request, AdminService $service)
    {
        $service->uploadSlider($request);

        return redirect()->back();
    }

    public function deactivation(HomeSlider $slider)
    {
        $slider->is_active = 0;
        $slider->save();

        return redirect()->back();
    }

    public function activation(HomeSlider $slider)
    {
        $slider->is_active = 1;
        $slider->save();

        return redirect()->back();
    }

    public function delete(HomeSlider $slider)
    {
        $slider->delete();

        return redirect()->back();
    }
}

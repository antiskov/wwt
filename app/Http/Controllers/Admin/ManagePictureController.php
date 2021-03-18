<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManagePictureRequest;
use App\Services\ManWomanPicturesService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ManagePictureController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.pages.manage_picture');
    }

    /**
     * @param ManagePictureRequest $request
     * @param ManWomanPicturesService $service
     * @return RedirectResponse
     */
    public function upload(ManagePictureRequest $request, ManWomanPicturesService $service): RedirectResponse
    {
        $service->createManWomanPictures($request);

        return redirect()->back();
    }
}

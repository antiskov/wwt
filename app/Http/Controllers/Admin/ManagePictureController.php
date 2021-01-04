<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManagePictureRequest;
use App\Services\ManWomanPicturesService;

class ManagePictureController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.pages.manage_picture');
    }

    /**
     * @param ManagePictureRequest $request
     * @param ManWomanPicturesService $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(ManagePictureRequest $request, ManWomanPicturesService $service)
    {
        $service->createManWomanPictures($request);

        return redirect()->back();
    }
}

<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManagePictureRequest;
use App\Services\ManWomanPicturesService;

class ManagePictureController extends Controller
{
    public function index()
    {
        return view('admin.pages.manage_picture');
    }

    public function upload(ManagePictureRequest $request, ManWomanPicturesService $service)
    {
        $service->createManWomanPictures($request);

        return redirect()->back();
    }
}

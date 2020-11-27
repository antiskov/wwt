<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManagePictureRequest;
use App\Models\ManWomanPicture;
use App\Services\AdminService;
use Illuminate\Http\Request;

class ManagePictureController extends Controller
{
    public function index()
    {
        return view('admin.pages.manage_picture');
    }

    public function upload(ManagePictureRequest $request, AdminService $service)
    {
        $service->createManWomanPictures($request);

        return redirect()->back();
    }
}

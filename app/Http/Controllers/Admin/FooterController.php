<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaLink;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FooterController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function mediaLinksIndex()
    {
        $mediaLinks = MediaLink::all();
        return view('admin.pages.manage_footer', ['mediaLinks' => $mediaLinks]);
    }

    /**
     * @param MediaLink $mediaLink
     * @param int $status
     * @return RedirectResponse
     */
    public function changeStatus(MediaLink $mediaLink, int $status): RedirectResponse
    {
        $mediaLink->is_active = $status;
        $mediaLink->save();

        return redirect()->back();
    }

    /**
     * @param MediaLink $mediaLink
     * @return Application|Factory|View
     */
    public function updateLinkIndex(MediaLink $mediaLink)
    {
        return view('admin.pages.update_media_links', ['mediaLink' => $mediaLink]);
    }

    /**
     * @param Request $request
     * @param MediaLink $mediaLink
     * @return RedirectResponse
     */
    public function updateLink(Request $request, MediaLink $mediaLink): RedirectResponse
    {
        $mediaLink->name = $request->name;
        $mediaLink->link_address = $request->link_address;
        $mediaLink->save();

        return redirect()->back();
    }
}

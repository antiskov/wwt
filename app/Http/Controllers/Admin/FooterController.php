<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaLink;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function mediaLinksIndex()
    {
        $mediaLinks = MediaLink::all();
        return view('admin.pages.manage_footer', ['mediaLinks' => $mediaLinks]);
    }

    public function changeStatus(MediaLink $mediaLink, int $status)
    {
        $mediaLink->is_active = $status;
        $mediaLink->save();

        return redirect()->back();
    }

    public function updateLinkIndex(MediaLink $mediaLink)
    {
        return view('admin.pages.update_media_links', ['mediaLink' => $mediaLink]);
    }

    public function updateLink(Request $request, MediaLink $mediaLink)
    {
        $mediaLink->name = $request->name;
        $mediaLink->link_address = $request->link_address;
        $mediaLink->save();

        return redirect()->back();
    }
}

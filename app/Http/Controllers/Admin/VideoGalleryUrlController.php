<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\VideoGalleryUrls;
use App\VideoGallery;

class VideoGalleryUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = VideoGalleryUrls::orderBy('video_gallery_id', 'ASC')->orderBy('sort_by', 'ASC')->get();
        return view('admin.videoGalleryUrl.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gallery = VideoGallery::orderBy('sort_by')->get();
        return view('admin.videoGalleryUrl.create', compact('gallery'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'video_gallery_id'=> 'required|integer',
            'url'=> 'required|min:3',
            'sort_by'=> 'nullable|numeric|between:0,99.99',
        ]);

        $videoGalleryUrls = new VideoGalleryUrls();
        $videoGalleryUrls->video_gallery_id = $request->video_gallery_id;
        $videoGalleryUrls->url = $request->url;
        $videoGalleryUrls->sort_by = $request->sort_by;
        $videoGalleryUrls->save();
        return redirect('/admin/videoGalleryUrl')->with('success', 'New Gallery Video has been added.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = VideoGalleryUrls::findOrFail($id);
        $gallery = VideoGallery::orderBy('sort_by')->get();
        return view('admin.videoGalleryUrl.edit', compact('video','gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'video_gallery_id'=> 'required|integer',
            'url'=> 'required|string|min:3',
            'sort_by'=> 'nullable|numeric|between:0,99.99',
        ]);

        $form_data = array(
            'video_gallery_id' => $request->video_gallery_id,
            'url' => $request->url,
            'sort_by' => $request->sort_by
        );
        VideoGalleryUrls::whereId($id)->update($form_data);
        return redirect('/admin/videoGalleryUrl')->with('success', 'Gallery Video has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = VideoGalleryUrls::findOrFail($id);
        $video->delete();
        return redirect('/admin/videoGalleryUrl')->with('success', 'Gallery Video has been deleted successfully');
    }
}

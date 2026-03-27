<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\VideoGallery;
use App\VideoGalleryUrls;
use DB;

class VideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = VideoGallery::orderBy('sort_by', 'ASC')->get();
        return view('admin.videoGallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videoGallery.create');
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
            'name'=> 'required|min:3',
            'sort_by'=> 'nullable|numeric|between:0,99.99',
        ]);

        $videoGallery = new VideoGallery();
        $videoGallery->name = $request->name;
        $videoGallery->sort_by = $request->sort_by;
        $videoGallery->save();
        return redirect('/admin/videoGallery')->with('success', 'Video Gallery Section has been added.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = VideoGallery::findOrFail($id);
        return view('admin.videoGallery.edit', compact('gallery'));
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
            'name'=> 'required|min:3|max:255',
            'sort_by'=> 'nullable|numeric|between:0,99.99',
            'url.*'=> 'nullable|string|min:3',
        ]);

        $form_data = array(
            'name' => $request->name,
            'sort_by' => $request->sort_by
        );
        VideoGallery::whereId($id)->update($form_data);

        try{
            if (isset($request->url[0])) {
                foreach ($request->url as $key => $value) {
                    $videoGalleryUrls = new VideoGalleryUrls([
                        'video_gallery_id' => $id,
                        'url' => $value,
                    ]);
                    $videoGalleryUrls->save();
                }
            }
        } catch (\Exception $e) {
            return redirect('/admin/videoGallery')->with('success', 'Video Gallery has been updated. But'.$e->getMessage());
        }
        return redirect('/admin/videoGallery')->with('success', 'Video Gallery has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = VideoGallery::findOrFail($id);
        $gallery->delete();
        $galleryUrl = DB::table('video_gallery_urls')->where('video_gallery_id', $id)->delete();
        return redirect('/admin/videoGallery')->with('success', 'Gallery Section has been deleted successfully');
    }
}

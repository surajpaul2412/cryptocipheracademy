<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Video;
use App\Module;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::all();
        return view('admin.videos.create', compact('modules'));
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
            'module_id' => 'required|integer',
            'title'=> 'nullable|min:3|string',
            'description'=> 'nullable|min:3|string',
            'video_url'=> 'required',
        ]);

        $videos = new Video();
        $videos->module_id = $request->module_id;
        $videos->title = $request->title;
        $videos->description = $request->description;
        $videos->video_url = $request->video_url;
        $videos->save();
        return redirect('/admin/videos')->with('success', 'Videos has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $videos = Video::findOrFail($id);
        $modules = Module::all();
        return view('admin.videos.edit', compact('videos','modules'));
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
            'module_id' => 'required|integer',
            'title'=> 'nullable|min:3|string',
            'description'=> 'nullable|min:3|string',
            'video_url'=> 'required',
        ]);

        $form_data = array(
            'module_id' => $request->module_id,
            'title' => $request->title,
            'description' => $request->description,
            'video_url' => $request->video_url
        );

        Video::whereId($id)->update($form_data);
        return redirect('/admin/videos')->with('success', 'Video has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $videos = Video::findOrFail($id);
        $videos->delete();
        return redirect('/admin/videos')->with('success', 'Video item has been deleted successfully.');
    }
}

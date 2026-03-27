<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AboutUsLibraryImages;

class AboutUsLibraryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutUsLibraryImage = AboutUsLibraryImages::all();
        return view('admin.aboutUsLibraryImage.index', compact('aboutUsLibraryImage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutUsLibraryImage.create');
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
            'image'=> 'required',
            'url'=> 'nullable'
        ]);

        $image_name = $request->image;
        $image = $request->file('image');
        if($image != ''){
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/aboutUs'), $image_name);
        }

        $aboutUsLibraryImage = new AboutUsLibraryImages();
        $aboutUsLibraryImage->image = $image_name;
        $aboutUsLibraryImage->url = $request->get('url');
        $aboutUsLibraryImage->save();
        return redirect('/admin/aboutUsLibraryImage')->with('success', 'Library image has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutUsLibraryImage = AboutUsLibraryImages::findOrFail($id);
        return view('admin.aboutUsLibraryImage.edit', compact('aboutUsLibraryImage'));
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
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != ''){
            $request->validate([
                'image'=> 'required',
                'url'=> 'nullable'
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/aboutUs'), $image_name);
        }

        $form_data = array(
            'image' => $image_name,
            'url' => $request->get('url')
        );

        AboutUsLibraryImages::whereId($id)->update($form_data);
        return redirect('/admin/aboutUsLibraryImage')->with('success', 'Library Image has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aboutUsLibraryImage = AboutUsLibraryImages::findOrFail($id);
        $aboutUsLibraryImage->delete();
        return redirect('/admin/aboutUsLibraryImage')->with('success', 'Library Image has been deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AboutUsTechnologyImage;

class AboutUsTechnologyImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutUsTechnologyImage = AboutUsTechnologyImage::all();
        return view('admin.aboutUsTechnologyImage.index', compact('aboutUsTechnologyImage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutUsTechnologyImage.create');
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

        $aboutUsTechnologyImage = new AboutUsTechnologyImages();
        $aboutUsTechnologyImage->image = $image_name;
        $aboutUsTechnologyImage->url = $request->get('url');
        $aboutUsTechnologyImage->save();
        return redirect('/admin/aboutUsTechnologyImage')->with('success', 'Technology image has been added.');
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
        $aboutUsTechnologyImage = AboutUsTechnologyImages::findOrFail($id);
        return view('admin.aboutUsTechnologyImage.edit', compact('aboutUsTechnologyImage'));
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

        AboutUsTechnologyImages::whereId($id)->update($form_data);
        return redirect('/admin/aboutUsTechnologyImage')->with('success', 'Technology Image has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aboutUsTechnologyImage = AboutUsTechnologyImages::findOrFail($id);
        $aboutUsTechnologyImage->delete();
        return redirect('/admin/aboutUsTechnologyImage')->with('success', 'Technology Image has been deleted successfully.');
    }
}

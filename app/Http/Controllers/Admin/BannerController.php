<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'image'=> 'required|image',
        'mobile_banner'=> 'required|image'
        ]);

        // banner image
        $image_name = $request->image;
        $mobile_banner_name = $request->mobile_banner;

        $image = $request->file('image');
        $mobile_banner = $request->file('mobile_banner');

        $image_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/banner'), $image_name);

        $mobile_image_name = rand() . '.' . $mobile_banner->getClientOriginalExtension();
        $mobile_banner->move(public_path('images/banner'), $mobile_image_name);
        

        $banner = new Banner([
        'image' => $image_name,
        'mobile_banner' => $mobile_image_name,
        ]);
        $banner->save();
        return redirect('/admin/banner')->with('success', 'banner uploaded successfully');
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
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
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
        $mobile_image_name = $request->hidden_mobile_banner;

        $image = $request->file('image');
        $mobile_image = $request->file('mobile_banner');

        if($image != ''){
            $request->validate([
                'image'=> 'required|image'
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/banner'), $image_name);
        }

        if($mobile_image != ''){
            $request->validate([
                'mobile_banner'=> 'required|image'
            ]);
            $mobile_image_name = rand() . '.' . $mobile_image->getClientOriginalExtension();
            $mobile_image->move(public_path('images/banner'), $mobile_image_name);
        }

        $form_data = array(
            'image' => $image_name,
            'mobile_banner' => $mobile_image_name
        );
        Banner::whereId($id)->update($form_data);
        return redirect('/admin/banner')->with('success', 'Banner has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        return redirect('/admin/banner')->with('success', 'Banner has been deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StudioEquipmentHardwareImage;

class StudioEquipmentHardwareImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studioEquipmentHardwareImage = StudioEquipmentHardwareImage::all();
        return view('admin.studioEquipmentHardwareImage.index', compact('studioEquipmentHardwareImage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.studioEquipmentHardwareImage.create');
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
            'image'=> 'required|image'
        ]);

        $image_name = $request->image;
        $image = $request->file('image');
        if($image != ''){
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/studioEquipment'), $image_name);
        }

        $studioEquipmentHardwareImage = new StudioEquipmentHardwareImage();
        $studioEquipmentHardwareImage->image = $image_name;
        $studioEquipmentHardwareImage->save();
        return redirect('/admin/studioEquipmentHardwareImage')->with('success', 'hardware image has been added.');
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
        $studioEquipmentHardwareImage = StudioEquipmentHardwareImage::findOrFail($id);
        return view('admin.studioEquipmentHardwareImage.edit', compact('studioEquipmentHardwareImage'));
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
                'image'=> 'required|image'
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/studioEquipment'), $image_name);
        }

        $form_data = array(
            'image' => $image_name
        );

        StudioEquipmentHardwareImage::whereId($id)->update($form_data);
        return redirect('/admin/studioEquipmentHardwareImage')->with('success', 'Hardware image has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studioEquipmentHardwareImage = StudioEquipmentHardwareImage::findOrFail($id);
        $studioEquipmentHardwareImage->delete();
        return redirect('/admin/studioEquipmentHardwareImage')->with('success', 'Hardware image has been deleted successfully.');
    }
}

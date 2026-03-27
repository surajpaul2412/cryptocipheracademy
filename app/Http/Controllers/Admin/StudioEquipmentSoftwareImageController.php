<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StudioEquipmentSoftwareImage;

class StudioEquipmentSoftwareImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studioEquipmentSoftwareImage = StudioEquipmentSoftwareImage::all();
        return view('admin.studioEquipmentSoftwareImage.index', compact('studioEquipmentSoftwareImage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.studioEquipmentSoftwareImage.create');
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

        $studioEquipmentSoftwareImage = new StudioEquipmentSoftwareImage();
        $studioEquipmentSoftwareImage->image = $image_name;
        $studioEquipmentSoftwareImage->save();
        return redirect('/admin/studioEquipmentSoftwareImage')->with('success', 'Software image has been added.');
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
        $studioEquipmentSoftwareImage = StudioEquipmentSoftwareImage::findOrFail($id);
        return view('admin.studioEquipmentSoftwareImage.edit', compact('studioEquipmentSoftwareImage'));
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

        StudioEquipmentSoftwareImage::whereId($id)->update($form_data);
        return redirect('/admin/studioEquipmentSoftwareImage')->with('success', 'Software image has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studioEquipmentSoftwareImage = StudioEquipmentSoftwareImage::findOrFail($id);
        $studioEquipmentSoftwareImage->delete();
        return redirect('/admin/studioEquipmentSoftwareImage')->with('success', 'Software image has been deleted successfully.');
    }
}

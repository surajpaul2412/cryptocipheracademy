<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StudioEquipmentSoftware;

class StudioEquipmentSoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studioEquipmentSoftware = StudioEquipmentSoftware::all();
        return view('admin.studioEquipmentSoftware.index', compact('studioEquipmentSoftware'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.studioEquipmentSoftware.create');
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
            'label'=> 'required|min:3|max:255',
            'option1'=> 'nullable|string',
            'option2'=> 'nullable|string',
            'option3'=> 'nullable|string',
            'option4'=> 'nullable|string',
            'option5'=> 'nullable|string'
        ]);

        $studioEquipmentSoftware = new StudioEquipmentSoftware();
        $studioEquipmentSoftware->label = $request->label;
        $studioEquipmentSoftware->option1 = $request->option1;
        $studioEquipmentSoftware->option2 = $request->option2;
        $studioEquipmentSoftware->option3 = $request->option3;
        $studioEquipmentSoftware->option4 = $request->option4;
        $studioEquipmentSoftware->option5 = $request->option5;
        $studioEquipmentSoftware->save();
        return redirect('/admin/studioEquipmentSoftware')->with('success', 'Menu has been added.');
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
        $studioEquipmentSoftware = StudioEquipmentSoftware::findOrFail($id);
        return view('admin.studioEquipmentSoftware.edit', compact('studioEquipmentSoftware'));
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
            'label'=> 'required|min:3|max:255',
            'option1'=> 'nullable|string',
            'option2'=> 'nullable|string',
            'option3'=> 'nullable|string',
            'option4'=> 'nullable|string',
            'option5'=> 'nullable|string'
        ]);

        $form_data = array(
            'label' => $request->label,
            'option1' => $request->option1,
            'option2' => $request->option2,
            'option3' => $request->option3,
            'option4' => $request->option4,
            'option5' => $request->option5
        );

        StudioEquipmentSoftware::whereId($id)->update($form_data);
        return redirect('/admin/studioEquipmentSoftware')->with('success', 'Menu has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studioEquipmentSoftware = StudioEquipmentSoftware::findOrFail($id);
        $studioEquipmentSoftware->delete();
        return redirect('/admin/studioEquipmentSoftware')->with('success', 'Menu item has been deleted successfully.');
    }
}

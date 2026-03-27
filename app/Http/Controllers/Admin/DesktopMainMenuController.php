<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DesktopMenuSection;

class DesktopMainMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', "asc")->get();
        return view('admin.desktopMenu.index', compact('desktopMenu'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $desktopMenu = DesktopMenuSection::findOrFail($id);
        return view('admin.desktopMenu.edit', compact('desktopMenu','id'));
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
            'sort_by'=> 'nullable|numeric|between:0,99.99',
        ]);

        $form_data = array(
            'sort_by' => $request->sort_by,
        );

        DesktopMenuSection::whereId($id)->update($form_data);
        return redirect('/admin/desktopMenu')->with('success', 'Section Sorting has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desktopMenu = DesktopMenuSection::findOrFail($id);
        $desktopMenu->delete();
        return redirect('/admin/desktopMenu')->with('success', 'Section and its options has been deleted successfully.');
    }
}

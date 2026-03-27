<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DesktopMainMenu;
use App\DesktopMenuSection;

class DesktopMainMenuSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desktopMenuSection = DesktopMainMenu::orderBy('sort_by', 'asc')->get();
        return view('admin.desktopMenuMain.index', compact('desktopMenuSection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = DesktopMenuSection::all();
        return view('admin.desktopMenuMain.create', compact('sections'));
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
            'desktop_menu_section_id'=> 'required',
            'name'=> 'required|min:3',
            'slug'=> 'required|min:3',
            'url'=> 'nullable',
            'sort_by'=> 'nullable|numeric|between:0,99.99',
        ]);

        $desktopMainMenu = new DesktopMainMenu();
        $desktopMainMenu->desktop_menu_section_id = $request->desktop_menu_section_id;
        $desktopMainMenu->slug = $request->slug;
        $desktopMainMenu->name = $request->name;
        $desktopMainMenu->url = $request->url;
        $desktopMainMenu->sort_by = $request->sort_by;
        $desktopMainMenu->save();
        return redirect('/admin/desktopMenuMain')->with('success', 'Desktop main menu item has been added.');
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
        $section = DesktopMenuSection::all();
        $desktopMenuMain = DesktopMainMenu::findOrFail($id);
        return view('admin.desktopMenuMain.edit', compact('desktopMenuMain','section'));
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
            'desktop_menu_section_id'=> 'required',
            'slug'=> 'required|min:3|max:255',
            'name'=> 'required|min:3',
            'url'=> 'nullable',
            'sort_by'=> 'nullable|numeric|between:0,99.99',
        ]);

        $form_data = array(
            'desktop_menu_section_id' => $request->desktop_menu_section_id,
            'slug' => $request->slug,
            'name' => $request->name,
            'url' => $request->url,
            'sort_by' => $request->sort_by
        );

        DesktopMainMenu::whereId($id)->update($form_data);
        return redirect('/admin/desktopMenuMain')->with('success', 'Desktop Main menu has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desktopMenuMain = DesktopMainMenu::findOrFail($id);
        $desktopMenuMain->delete();
        return redirect('/admin/desktopMenuMain')->with('success', 'Desktop main menu item has been deleted successfully.');
    }
}

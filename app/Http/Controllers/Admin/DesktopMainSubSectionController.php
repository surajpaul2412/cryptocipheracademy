<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DesktopMainMenu;
use App\DesktopSubMenu;

class DesktopMainSubSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desktopMenuSub = DesktopSubMenu::orderBy('desktop_main_menu_id', "asc")->orderBy('sort_by', "asc")->get();
        return view('admin.desktopMenuSub.index', compact('desktopMenuSub'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = DesktopMainMenu::all();
        return view('admin.desktopMenuSub.create', compact('menus'));
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
            'desktop_main_menu_id'=> 'required',
            'name'=> 'required|min:3',
            'slug'=> 'required|min:3',
            'url'=> 'nullable',
            'sort_by'=> 'nullable|numeric|between:0,99.99',
        ]);

        $desktopSubMenu = new DesktopSubMenu();
        $desktopSubMenu->desktop_main_menu_id = $request->desktop_main_menu_id;
        $desktopSubMenu->slug = $request->slug;
        $desktopSubMenu->name = $request->name;
        $desktopSubMenu->url = $request->url;
        $desktopSubMenu->sort_by = $request->sort_by;
        $desktopSubMenu->save();
        return redirect('/admin/desktopMenuSub')->with('success', 'Desktop sub menu item has been added.');
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
        $menus = DesktopMainMenu::all();
        $desktopMenuSub = DesktopSubMenu::findOrFail($id);
        return view('admin.desktopMenuSub.edit', compact('desktopMenuSub','menus'));
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
            'desktop_main_menu_id'=> 'required',
            'slug'=> 'required|min:3|max:255',
            'name'=> 'required|min:3',
            'url'=> 'nullable',
            'sort_by'=> 'nullable|numeric|between:0,99.99',
        ]);

        $form_data = array(
            'desktop_main_menu_id' => $request->desktop_main_menu_id,
            'slug' => $request->slug,
            'name' => $request->name,
            'url' => $request->url,
            'sort_by' => $request->sort_by
        );

        DesktopSubMenu::whereId($id)->update($form_data);
        return redirect('/admin/desktopMenuSub')->with('success', 'Desktop Sub menu has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desktopMenuSub = DesktopSubMenu::findOrFail($id);
        $desktopMenuSub->delete();
        return redirect('/admin/desktopMenuSub')->with('success', 'Desktop sub menu has been deleted successfully.');
    }
}

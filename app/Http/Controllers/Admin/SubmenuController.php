<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Submenu;
use App\Menu;

class SubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $submenus = Submenu::orderBy('menu_id')->orderBy('id', 'asc')->get();
        return view('admin.submenu.index', compact('submenus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('admin.submenu.create', compact('menus'));
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
            'menu_id'=> 'required',
            'name'=> 'required|min:3',
            'slug'=> 'required|min:3',
            'url'=> 'nullable',
        ]);

        $submenu = new Submenu();
        $submenu->menu_id = $request->menu_id;
        $submenu->slug = $request->slug;
        $submenu->name = $request->name;
        $submenu->url = $request->url;
        $submenu->save();
        return redirect('/admin/submenu')->with('success', 'Sub menu has been added.');
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
        $menus = Menu::all();
        $submenu = Submenu::findOrFail($id);
        return view('admin.submenu.edit', compact('submenu','menus'));
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
            'menu_id'=> 'required',
            'slug'=> 'required|min:3|max:255',
            'name'=> 'required|min:3',
            'url'=> 'nullable',
        ]);

        $form_data = array(
            'menu_id' => $request->menu_id,
            'slug' => $request->slug,
            'name' => $request->name,
            'url' => $request->url
        );

        Submenu::whereId($id)->update($form_data);
        return redirect('/admin/submenu')->with('success', 'Sub menu has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $submenu = Submenu::findOrFail($id);
        $submenu->delete();
        return redirect('/admin/submenu')->with('success', 'Sub menu item has been deleted successfully.');
    }
}

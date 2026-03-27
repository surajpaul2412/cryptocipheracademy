<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy('sort_by', "asc")->get();
        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create');
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
            'slug'=> 'required|min:3|max:255',
            'name'=> 'required|min:3',
            'url'=> 'nullable|string',
            'sort_by'=> 'nullable|numeric|between:0,99.99',
        ]);

        $menus = new Menu();
        $menus->slug = $request->slug;
        $menus->name = $request->name;
        $menus->url = $request->url;
        $menus->sort_by = $request->sort_by;
        $menus->save();
        return redirect('/admin/menu')->with('success', 'Menu has been added.');
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
        $menu = Menu::findOrFail($id);
        return view('admin.menu.edit', compact('menu'));
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
            'slug'=> 'required|min:3|max:255',
            'name'=> 'required|min:3',
            'url'=> 'nullable|string',
            'sort_by'=> 'nullable|numeric|between:0,99.99',
        ]);

        $form_data = array(
            'slug' => $request->slug,
            'name' => $request->name,
            'url' => $request->url,
            'sort_by' => $request->sort_by,
        );

        Menu::whereId($id)->update($form_data);
        return redirect('/admin/menu')->with('success', 'Menu has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menus = Menu::findOrFail($id);
        $menus->delete();
        return redirect('/admin/menu')->with('success', 'Menu item has been deleted successfully.');
    }
}

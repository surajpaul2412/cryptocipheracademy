<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MusicProductionOnlineModule;

class MusicProductionOnlineModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicProductionOnlineModule = MusicProductionOnlineModule::all();
        return view('admin.musicProductionOnlineModule.index', compact('musicProductionOnlineModule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.musicProductionOnlineModule.create');
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
        'icon'=> 'required|image',
        'image'=> 'required|image',
        'heading'=> 'required|string|min:3|max:255',
        'content'=> 'required|string|min:3'
        ]);

        // short_image1
        $icon_name = $request->icon;
        $icon = $request->file('icon');
        if($icon != ''){
            $icon_name = rand() . '.' . $icon->getClientOriginalExtension();
            $icon->move(public_path('images/module'), $icon_name);
        }
        // long image
        $image_name = $request->image;
        $image = $request->file('image');
        if($image != ''){
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/module'), $image_name);
        }

        $musicProductionOnlineModule = new MusicProductionOnlineModule([
        'icon' => $icon_name,
        'image' => $image_name,
        'heading' => $request->get('heading'),
        'content' => $request->get('content'),
        ]);
        $musicProductionOnlineModule->save();
        return redirect('/admin/musicProductionOnlineModule')->with('success', 'Module has been added');
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
        $musicProductionOnlineModule = MusicProductionOnlineModule::findOrFail($id);
        return view('admin.musicProductionOnlineModule.edit', compact('musicProductionOnlineModule'));
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
        $icon_name = $request->hidden_icon;
        $image_name = $request->hidden_image;

        $icon = $request->file('icon');
        $image = $request->file('image');

        if($icon != ''){
            $request->validate([
                'icon'=> 'required|image',
                'heading'=> 'required|string|min:3|max:255',
                'content'=> 'required|string|min:3',
            ]);
            $icon_name = rand() . '.' . $icon->getClientOriginalExtension();
            $icon->move(public_path('images/module'), $icon_name);
        }

        if($image != ''){
            $request->validate([
                'image'=> 'required|image',
                'heading'=> 'required|string|min:3|max:255',
                'content'=> 'required|string|min:3',
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/module'), $image_name);
        }

        $form_data = array(
            'icon' => $icon_name,
            'image' => $image_name,
            'heading' => $request->heading,
            'content' => $request->content,
        );
        MusicProductionOnlineModule::whereId($id)->update($form_data);
        return redirect('/admin/musicProductionOnlineModule')->with('success', 'Module has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $musicProductionOnlineModule = MusicProductionOnlineModule::find($id);
        $musicProductionOnlineModule->delete();
        return redirect('/admin/musicProductionOnlineModule')->with('success', 'Module has been deleted successfully');
    }
}

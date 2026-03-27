<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MusicProductionDiplomaModule;

class MusicProductionDiplomaModuleController extends Controller
{
    public function index()
    {
        $musicProductionDiplomaModule = MusicProductionDiplomaModule::all();
        return view('admin.musicProductionDiplomaModule.index', compact('musicProductionDiplomaModule'));
    }

    public function create()
    {
        return view('admin.musicProductionDiplomaModule.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|image',
            'image' => 'required|image',
            'heading' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:3',
        ]);

        $icon_name = $request->icon;
        $icon = $request->file('icon');
        if ($icon) {
            $icon_name = rand() . '.' . $icon->getClientOriginalExtension();
            $icon->move(public_path('images/module'), $icon_name);
        }

        $image_name = $request->image;
        $image = $request->file('image');
        if ($image) {
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/module'), $image_name);
        }

        $musicProductionDiplomaModule = new MusicProductionDiplomaModule([
            'icon' => $icon_name,
            'image' => $image_name,
            'heading' => $request->get('heading'),
            'content' => $request->get('content'),
        ]);
        $musicProductionDiplomaModule->save();

        return redirect('/admin/musicProductionDiplomaModule')->with('success', 'Module has been added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $musicProductionDiplomaModule = MusicProductionDiplomaModule::findOrFail($id);
        return view('admin.musicProductionDiplomaModule.edit', compact('musicProductionDiplomaModule'));
    }

    public function update(Request $request, $id)
    {
        $icon_name = $request->hidden_icon;
        $image_name = $request->hidden_image;

        $icon = $request->file('icon');
        $image = $request->file('image');

        if ($icon) {
            $request->validate([
                'icon' => 'required|image',
                'heading' => 'required|string|min:3|max:255',
                'content' => 'required|string|min:3',
            ]);
            $icon_name = rand() . '.' . $icon->getClientOriginalExtension();
            $icon->move(public_path('images/module'), $icon_name);
        }

        if ($image) {
            $request->validate([
                'image' => 'required|image',
                'heading' => 'required|string|min:3|max:255',
                'content' => 'required|string|min:3',
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/module'), $image_name);
        }

        $form_data = [
            'icon' => $icon_name,
            'image' => $image_name,
            'heading' => $request->heading,
            'content' => $request->content,
        ];

        MusicProductionDiplomaModule::whereId($id)->update($form_data);

        return redirect('/admin/musicProductionDiplomaModule')->with('success', 'Module has been updated.');
    }

    public function destroy($id)
    {
        $musicProductionDiplomaModule = MusicProductionDiplomaModule::findOrFail($id);
        $musicProductionDiplomaModule->delete();
        return redirect('/admin/musicProductionDiplomaModule')->with('success', 'Module has been deleted successfully');
    }
}

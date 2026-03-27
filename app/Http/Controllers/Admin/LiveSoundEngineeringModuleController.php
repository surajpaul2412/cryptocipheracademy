<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LiveSoundEngineeringModule;

class LiveSoundEngineeringModuleController extends Controller
{
    public function index()
    {
        $liveSoundEngineeringModule = LiveSoundEngineeringModule::all();
        return view('admin.liveSoundEngineeringDiplomaModule.index', compact('liveSoundEngineeringModule'));
    }

    public function create()
    {
        return view('admin.liveSoundEngineeringDiplomaModule.create');
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

        $liveSoundEngineeringModule = new LiveSoundEngineeringModule([
            'icon' => $icon_name,
            'image' => $image_name,
            'heading' => $request->get('heading'),
            'content' => $request->get('content'),
        ]);
        $liveSoundEngineeringModule->save();

        return redirect('/admin/liveSoundEngineeringDiplomaModule')->with('success', 'Module has been added');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $liveSoundEngineeringModule = LiveSoundEngineeringModule::findOrFail($id);
        return view('admin.liveSoundEngineeringDiplomaModule.edit', compact('liveSoundEngineeringModule'));
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

        LiveSoundEngineeringModule::whereId($id)->update($form_data);

        return redirect('/admin/liveSoundEngineeringDiplomaModule')->with('success', 'Module has been updated.');
    }

    public function destroy($id)
    {
        $liveSoundEngineeringModule = LiveSoundEngineeringModule::findOrFail($id);
        $liveSoundEngineeringModule->delete();
        return redirect('/admin/liveSoundEngineeringDiplomaModule')->with('success', 'Module has been deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LiveSoundEngineeringSound;

class LiveSoundEngineeringSoundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $liveSoundEngineeringSound = LiveSoundEngineeringSound::all();
        return view('admin.liveSoundEngineeringDiplomaSound.index', compact('liveSoundEngineeringSound'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.liveSoundEngineeringDiplomaSound.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|min:3',
        ]);

        $liveSoundEngineeringSound = new LiveSoundEngineeringSound([
            'content' => $request->get('content'),
        ]);
        $liveSoundEngineeringSound->save();

        return redirect('/admin/liveSoundEngineeringDiplomaSound')->with('success', 'Sound has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $liveSoundEngineeringSound = LiveSoundEngineeringSound::findOrFail($id);
        return view('admin.liveSoundEngineeringDiplomaSound.edit', compact('liveSoundEngineeringSound'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|min:3',
        ]);

        $form_data = [
            'content' => $request->content,
        ];

        LiveSoundEngineeringSound::whereId($id)->update($form_data);

        return redirect('/admin/liveSoundEngineeringDiplomaSound')->with('success', 'Sound has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $liveSoundEngineeringSound = LiveSoundEngineeringSound::findOrFail($id);
        $liveSoundEngineeringSound->delete();

        return redirect('/admin/liveSoundEngineeringDiplomaSound')->with('success', 'Sound has been deleted successfully');
    }
}

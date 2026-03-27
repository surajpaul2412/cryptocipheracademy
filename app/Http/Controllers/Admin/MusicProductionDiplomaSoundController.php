<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MusicProductionDiplomaSound;

class MusicProductionDiplomaSoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicProductionDiplomaSound = MusicProductionDiplomaSound::all();
        return view('admin.musicProductionDiplomaSound.index', compact('musicProductionDiplomaSound'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.musicProductionDiplomaSound.create');
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
            'content' => 'required|min:3',
        ]);

        $musicProductionDiplomaSound = new MusicProductionDiplomaSound([
            'content' => $request->get('content'),
        ]);
        $musicProductionDiplomaSound->save();

        return redirect('/admin/musicProductionDiplomaSound')->with('success', 'Sound has been added');
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
        $musicProductionDiplomaSound = MusicProductionDiplomaSound::findOrFail($id);
        return view('admin.musicProductionDiplomaSound.edit', compact('musicProductionDiplomaSound'));
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
            'content' => 'required|min:3',
        ]);

        $form_data = [
            'content' => $request->content,
        ];

        MusicProductionDiplomaSound::whereId($id)->update($form_data);

        return redirect('/admin/musicProductionDiplomaSound')->with('success', 'Sound has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $musicProductionDiplomaSound = MusicProductionDiplomaSound::findOrFail($id);
        $musicProductionDiplomaSound->delete();

        return redirect('/admin/musicProductionDiplomaSound')->with('success', 'Sound has been deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MusicProductionOnlineSound;

class MusicProductionOnlineSoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicProductionOnlineSound = MusicProductionOnlineSound::all();
        return view('admin.musicProductionOnlineSound.index', compact('musicProductionOnlineSound'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.musicProductionOnlineSound.create');
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
        'content'=> 'required|min:3',
        ]);
        $musicProductionOnlineSound = new MusicProductionOnlineSound([
        'content' => $request->get('content'),
        ]);
        $musicProductionOnlineSound->save();
        return redirect('/admin/musicProductionOnlineSound')->with('success', 'Course Sound has been added');
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
        $musicProductionOnlineSound = MusicProductionOnlineSound::findOrFail($id);
        return view('admin.musicProductionOnlineSound.edit', compact('musicProductionOnlineSound'));
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
            'content'=> 'required|min:3',
        ]);

        $form_data = array(
            'content' => $request->content
        );
        MusicProductionOnlineSound::whereId($id)->update($form_data);
        return redirect('/admin/musicProductionOnlineSound')->with('success', 'Course has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $musicProductionOnlineSound = MusicProductionOnlineSound::find($id);
        $musicProductionOnlineSound->delete();
        return redirect('/admin/musicProductionOnlineSound')->with('success', 'Course has been deleted successfully');
    }
}

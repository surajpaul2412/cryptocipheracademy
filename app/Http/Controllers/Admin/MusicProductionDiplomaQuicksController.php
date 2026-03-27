<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MusicProductionDiplomaQuick;

class MusicProductionDiplomaQuicksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicProductionDiplomaQuick = MusicProductionDiplomaQuick::all();
        return view('admin.musicProductionDiplomaQuick.index', compact('musicProductionDiplomaQuick'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.musicProductionDiplomaQuick.create');
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
        $musicProductionDiplomaQuick = new MusicProductionDiplomaQuick([
        'content' => $request->get('content'),
        ]);
        $musicProductionDiplomaQuick->save();
        return redirect('/admin/musicProductionDiplomaQuick')->with('success', 'Music Production Diploma Course has been added');
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
        $musicProductionDiplomaQuick = MusicProductionDiplomaQuick::findOrFail($id);
        return view('admin.musicProductionDiplomaQuick.edit', compact('musicProductionDiplomaQuick'));
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
        MusicProductionDiplomaQuick::whereId($id)->update($form_data);
        return redirect('/admin/musicProductionDiplomaQuick')->with('success', 'Course has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $musicProductionDiplomaQuick = MusicProductionDiplomaQuick::find($id);
        $musicProductionDiplomaQuick->delete();
        return redirect('/admin/musicProductionDiplomaQuick')->with('success', 'Course has been deleted successfully');
    }
}

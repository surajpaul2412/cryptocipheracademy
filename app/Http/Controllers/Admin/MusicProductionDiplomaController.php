<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MusicProductionDiploma;

class MusicProductionDiplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicProductionDiploma = MusicProductionDiploma::all();
        return view('admin.musicProductionDiploma.index', compact('musicProductionDiploma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $musicProductionDiploma = MusicProductionDiploma::findOrFail($id);
        return view('admin.musicProductionDiploma.edit', compact('musicProductionDiploma'));
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
        MusicProductionDiploma::whereId($id)->update($form_data);
        return redirect('/admin/musicProductionDiploma')->with('success', 'Content has been updated.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MusicProductionDiplomaLogic;

class MusicProductionDiplomaLogicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicProductionDiplomaLogic = MusicProductionDiplomaLogic::all();
        return view('admin.musicProductionDiplomaLogic.index', compact('musicProductionDiplomaLogic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.MusicProductionDiplomaLogic.create');
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
        $musicProductionDiplomaLogic = new MusicProductionDiplomaLogic([
        'content' => $request->get('content'),
        ]);
        $musicProductionDiplomaLogic->save();
        return redirect('/admin/musicProductionDiplomaLogic')->with('success', 'Content Pro has been added');
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
        $musicProductionDiplomaLogic = MusicProductionDiplomaLogic::findOrFail($id);
        return view('admin.musicProductionDiplomaLogic.edit', compact('musicProductionDiplomaLogic'));
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
        MusicProductionDiplomaLogic::whereId($id)->update($form_data);
        return redirect('/admin/musicProductionDiplomaLogic')->with('success', 'Course has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $musicProductionDiplomaLogic = MusicProductionDiplomaLogic::find($id);
        $musicProductionDiplomaLogic->delete();
        return redirect('/admin/musicProductionDiplomaLogic')->with('success', 'Course has been deleted successfully');
    }
}

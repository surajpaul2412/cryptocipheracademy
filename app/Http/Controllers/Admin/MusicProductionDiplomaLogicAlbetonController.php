<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MusicProductionDiplomaLogicAbleton;

class MusicProductionDiplomaLogicAlbetonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicProductionDiplomaLogicAbleton = MusicProductionDiplomaLogicAbleton::all();
        return view('admin.musicProductionDiplomaLogicAbleton.index', compact('musicProductionDiplomaLogicAbleton'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.musicProductionDiplomaLogicAbleton.create');
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

        $record = new MusicProductionDiplomaLogicAbleton([
            'content' => $request->get('content'),
        ]);
        $record->save();

        return redirect('/admin/musicProductionDiplomaLogicAbleton')->with('success', 'Module has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MusicProductionDiplomaLogicAbleton  $logicAbleton
     * @return \Illuminate\Http\Response
     */
    public function show(MusicProductionDiplomaLogicAbleton $logicAbleton)
    {
        return view('admin.musicProductionDiplomaLogicAbleton.show', compact('logicAbleton'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MusicProductionDiplomaLogicAbleton  $logicAbleton
     * @return \Illuminate\Http\Response
     */
    public function edit(MusicProductionDiplomaLogicAbleton $logicAbleton)
    {
        return view('admin.musicProductionDiplomaLogicAbleton.edit', compact('logicAbleton'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MusicProductionDiplomaLogicAbleton  $logicAbleton
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MusicProductionDiplomaLogicAbleton $logicAbleton)
    {
        $request->validate([
            'content' => 'required|min:3',
        ]);

        $logicAbleton->update([
            'content' => $request->content,
        ]);

        return redirect('/admin/musicProductionDiplomaLogicAbleton')->with('success', 'Module has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MusicProductionDiplomaLogicAbleton  $logicAbleton
     * @return \Illuminate\Http\Response
     */
    public function destroy(MusicProductionDiplomaLogicAbleton $logicAbleton)
    {
        $logicAbleton->delete();

        return redirect('/admin/musicProductionDiplomaLogicAbleton')->with('success', 'Module has been deleted successfully.');
    }
}

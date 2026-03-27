<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MusicProductionDiplomaOverview;

class MusicProductionDiplomaOverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicProductionDiplomaOverview = MusicProductionDiplomaOverview::all();
        return view('admin.musicProductionDiplomaOverview.index', compact('musicProductionDiplomaOverview'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.musicProductionDiplomaOverview.create');
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

        $musicProductionDiplomaOverview = new MusicProductionDiplomaOverview([
            'content' => $request->get('content'),
        ]);

        $musicProductionDiplomaOverview->save();

        return redirect('/admin/musicProductionDiplomaOverview')->with('success', 'Point has been added');
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
        $musicProductionDiplomaOverview = MusicProductionDiplomaOverview::findOrFail($id);
        return view('admin.musicProductionDiplomaOverview.edit', compact('musicProductionDiplomaOverview'));
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

        MusicProductionDiplomaOverview::whereId($id)->update($form_data);

        return redirect('/admin/musicProductionDiplomaOverview')->with('success', 'Point has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $musicProductionDiplomaOverview = MusicProductionDiplomaOverview::findOrFail($id);
        $musicProductionDiplomaOverview->delete();

        return redirect('/admin/musicProductionDiplomaOverview')->with('success', 'Point has been deleted successfully');
    }
}

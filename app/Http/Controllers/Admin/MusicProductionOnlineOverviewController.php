<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MusicProductionOnlineOverview;

class MusicProductionOnlineOverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicProductionOnlineOverview = MusicProductionOnlineOverview::all();
        return view('admin.musicProductionOnlineOverview.index', compact('musicProductionOnlineOverview'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.musicProductionOnlineOverview.create');
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
        $musicProductionOnlineOverview = new MusicProductionOnlineOverview([
            'content' => $request->get('content'),
        ]);
        $musicProductionOnlineOverview->save();
        return redirect('/admin/musicProductionOnlineOverview')->with('success', 'Point has been added');
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
        $musicProductionOnlineOverview = MusicProductionOnlineOverview::findOrFail($id);
        return view('admin.musicProductionOnlineOverview.edit', compact('musicProductionOnlineOverview'));
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
        MusicProductionOnlineOverview::whereId($id)->update($form_data);
        return redirect('/admin/musicProductionOnlineOverview')->with('success', 'Point has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $musicProductionOnlineOverview = MusicProductionOnlineOverview::find($id);
        $musicProductionOnlineOverview->delete();
        return redirect('/admin/musicProductionOnlineOverview')->with('success', 'Point has been deleted successfully');
    }
}

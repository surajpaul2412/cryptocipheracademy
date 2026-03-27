<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LiveSoundEngineeringOverview;

class LiveSoundEngineeringOverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $liveSoundEngineeringOverview = LiveSoundEngineeringOverview::all();
        return view('admin.liveSoundEngineeringDiplomaOverview.index', compact('liveSoundEngineeringOverview'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.liveSoundEngineeringDiplomaOverview.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|min:3',
        ]);

        $liveSoundEngineeringOverview = new LiveSoundEngineeringOverview([
            'content' => $request->get('content'),
        ]);

        $liveSoundEngineeringOverview->save();

        return redirect('/admin/liveSoundEngineeringDiplomaOverview')->with('success', 'Point has been added');
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
        $liveSoundEngineeringOverview = LiveSoundEngineeringOverview::findOrFail($id);
        return view('admin.liveSoundEngineeringDiplomaOverview.edit', compact('liveSoundEngineeringOverview'));
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

        LiveSoundEngineeringOverview::whereId($id)->update($form_data);

        return redirect('/admin/liveSoundEngineeringDiplomaOverview')->with('success', 'Point has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $liveSoundEngineeringOverview = LiveSoundEngineeringOverview::findOrFail($id);
        $liveSoundEngineeringOverview->delete();

        return redirect('/admin/liveSoundEngineeringDiplomaOverview')->with('success', 'Point has been deleted successfully');
    }
}

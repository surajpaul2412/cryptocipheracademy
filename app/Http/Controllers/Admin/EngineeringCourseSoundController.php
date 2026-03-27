<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EngineeringCourseSound;

class EngineeringCourseSoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $engineeringCourseSound = EngineeringCourseSound::all();
        return view('admin.engineeringCourseSound.index', compact('engineeringCourseSound'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.engineeringCourseSound.create');
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
        $engineeringCourseSound = new EngineeringCourseSound([
        'content' => $request->get('content'),
        ]);
        $engineeringCourseSound->save();
        return redirect('/admin/engineeringCourseSound')->with('success', 'Course Sound has been added');
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
        $engineeringCourseSound = EngineeringCourseSound::findOrFail($id);
        return view('admin.engineeringCourseSound.edit', compact('engineeringCourseSound'));
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
        EngineeringCourseSound::whereId($id)->update($form_data);
        return redirect('/admin/engineeringCourseSound')->with('success', 'Course has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $engineeringCourseSound = EngineeringCourseSound::find($id);
        $engineeringCourseSound->delete();
        return redirect('/admin/engineeringCourseSound')->with('success', 'Course has been deleted successfully');
    }
}

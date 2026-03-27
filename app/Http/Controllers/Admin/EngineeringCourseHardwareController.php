<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EngineeringCourseHardware;

class EngineeringCourseHardwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $engineeringCourseHardware = EngineeringCourseHardware::all();
        return view('admin.engineeringCourseHardware.index', compact('engineeringCourseHardware'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.engineeringCourseHardware.create');
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
        $engineeringCourseHardware = new EngineeringCourseHardware([
        'content' => $request->get('content'),
        ]);
        $engineeringCourseHardware->save();
        return redirect('/admin/engineeringCourseHardware')->with('success', 'Course Sound has been added');
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
        $engineeringCourseHardware = EngineeringCourseHardware::findOrFail($id);
        return view('admin.engineeringCourseHardware.edit', compact('engineeringCourseHardware'));
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
        EngineeringCourseHardware::whereId($id)->update($form_data);
        return redirect('/admin/engineeringCourseHardware')->with('success', 'Course has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $engineeringCourseHardware = EngineeringCourseHardware::find($id);
        $engineeringCourseHardware->delete();
        return redirect('/admin/engineeringCourseHardware')->with('success', 'Course has been deleted successfully');
    }
}

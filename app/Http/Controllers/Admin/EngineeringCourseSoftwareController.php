<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EngineeringCourseSoftware;

class EngineeringCourseSoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $engineeringCourseSoftware = EngineeringCourseSoftware::all();
        return view('admin.engineeringCourseSoftware.index', compact('engineeringCourseSoftware'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.engineeringCourseSoftware.create');
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
        $engineeringCourseSoftware = new EngineeringCourseSoftware([
        'content' => $request->get('content'),
        ]);
        $engineeringCourseSoftware->save();
        return redirect('/admin/engineeringCourseSoftware')->with('success', 'Course Sound has been added');
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
        $engineeringCourseSoftware = EngineeringCourseSoftware::findOrFail($id);
        return view('admin.engineeringCourseSoftware.edit', compact('engineeringCourseSoftware'));
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
        EngineeringCourseSoftware::whereId($id)->update($form_data);
        return redirect('/admin/engineeringCourseSoftware')->with('success', 'Course has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $engineeringCourseSoftware = EngineeringCourseSoftware::find($id);
        $engineeringCourseSoftware->delete();
        return redirect('/admin/engineeringCourseSoftware')->with('success', 'Course has been deleted successfully');
    }
}

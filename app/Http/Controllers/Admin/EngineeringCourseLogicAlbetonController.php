<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EngineeringCourseLogicAbleton;

class EngineeringCourseLogicAlbetonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $engineeringCourseLogicAbleton = EngineeringCourseLogicAbleton::all();
        return view('admin.engineeringCourseLogicAbleton.index', compact('engineeringCourseLogicAbleton'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $engineeringCourseLogicAbleton = EngineeringCourseLogicAbleton::findOrFail($id);
        return view('admin.engineeringCourseLogicAbleton.edit', compact('engineeringCourseLogicAbleton'));
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
        $form_data = array(
            'content' => $request->content,
        );
        EngineeringCourseLogicAbleton::whereId($id)->update($form_data);
        return redirect('/admin/engineeringCourseLogicAbleton')->with('success', 'Module has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

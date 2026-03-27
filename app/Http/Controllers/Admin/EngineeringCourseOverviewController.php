<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EngineeringCourseOverview;

class EngineeringCourseOverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $engineeringCourseOverview = EngineeringCourseOverview::all();
        return view('admin.engineeringCourseOverview.index', compact('engineeringCourseOverview'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.engineeringCourseOverview.create');
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
        $engineeringCourseOverview = new EngineeringCourseOverview([
            'content' => $request->get('content'),
        ]);
        $engineeringCourseOverview->save();
        return redirect('/admin/engineeringCourseOverview')->with('success', 'Point has been added');
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
        $engineeringCourseOverview = EngineeringCourseOverview::findOrFail($id);
        return view('admin.engineeringCourseOverview.edit', compact('engineeringCourseOverview'));
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
        EngineeringCourseOverview::whereId($id)->update($form_data);
        return redirect('/admin/engineeringCourseOverview')->with('success', 'Point has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $engineeringCourseOverview = EngineeringCourseOverview::find($id);
        $engineeringCourseOverview->delete();
        return redirect('/admin/engineeringCourseOverview')->with('success', 'Point has been deleted successfully');
    }
}

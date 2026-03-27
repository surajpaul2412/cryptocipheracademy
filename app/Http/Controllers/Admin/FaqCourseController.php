<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FaqCourse;

class FaqCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqCourse = FaqCourse::all();
        return view('admin.faqCourse.index', compact('faqCourse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqCourse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'heading'=> 'required|min:3|max:255',
            'content'=> 'required|min:3',
        ]);

        $faqCourse = new FaqCourse();
        $faqCourse->heading = $request->heading;
        $faqCourse->content = $request->content;
        $faqCourse->save();
        return redirect('/admin/faqCourse')->with('success', 'Course FAQ has been added.');
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
        $faqCourse = FaqCourse::findOrFail($id);
        return view('admin.faqCourse.edit', compact('faqCourse'));
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
        $this->validate($request, [
            'heading'=> 'required|min:3|max:255',
            'content'=> 'required|min:3',
        ]);

        $form_data = array(
            'heading' => $request->heading,
            'content' => $request->content,
        );

        FaqCourse::whereId($id)->update($form_data);
        return redirect('/admin/faqCourse')->with('success', 'faqCourse has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faqCourse = FaqCourse::findOrFail($id);
        $faqCourse->delete();
        return redirect('/admin/faqCourse')->with('success', 'faqCourse has been deleted successfully.');
    }
}

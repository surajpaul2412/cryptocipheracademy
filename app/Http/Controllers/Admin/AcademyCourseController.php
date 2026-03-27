<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AcademyCourse;

class AcademyCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academyCourse = AcademyCourse::all();
        return view('admin.academyCourse.index', compact('academyCourse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.academyCourse.create');
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
            'image'=> 'required',
            'heading'=> 'required|min:3|max:255',
            'content'=> 'required|min:3',
            'url'=> 'nullable',
        ]);

        $image_name = $request->image;
        $image = $request->file('image');
        if($image != ''){
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/academyCourse'), $image_name);
        }

        $academyCourse = new AcademyCourse();
        $academyCourse->heading = $request->heading;
        $academyCourse->content = $request->content;
        $academyCourse->image = $image_name;
        $academyCourse->url = $request->url;
        $academyCourse->save();
        return redirect('/admin/academyCourse')->with('success', 'Course has been added.');
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
        $academyCourse = AcademyCourse::findOrFail($id);
        return view('admin.academyCourse.edit', compact('academyCourse'));
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
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != ''){
            $request->validate([
                'image'=> 'required',
                'heading'=> 'required|min:3|max:255',
                'content'=> 'required|min:3',
                'url'=> 'nullable',
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/academyCourse'), $image_name);
        } else{
            $request->validate([
                'heading'=> 'required|min:3|max:255',
                'content'=> 'required|min:3',
                'url'=> 'nullable',
            ]);
        }

        $form_data = array(
            'heading' => $request->heading,
            'content' => $request->content,
            'url' => $request->url,
            'image' => $image_name
        );

        AcademyCourse::whereId($id)->update($form_data);
        return redirect('/admin/academyCourse')->with('success', 'Course has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $academyCourse = AcademyCourse::findOrFail($id);
        $academyCourse->delete();
        return redirect('/admin/academyCourse')->with('success', 'Course has been deleted successfully.');
    }
}
